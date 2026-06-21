import random
import tkinter.messagebox as messagebox
import customtkinter as ctk

try:
    import winsound
except ImportError:
    winsound = None


KEY_SIZE = 5
MIN_NUMBER = 0
MAX_NUMBER = 100
GUESS_CANDIDATES_TO_TEST = 800


def matches_constraint(candidate, guess, selected_numbers):
    return (set(candidate) & set(guess)) == set(selected_numbers)


class KeyAIGame:
    def __init__(self, root):
        self.root = root

        # Fixed application window, but UI uses expandable layout internally.
        self.root.geometry("900x620")
        self.root.minsize(900, 620)
        self.root.maxsize(900, 620)
        self.root.title("Key Solver")

        ctk.set_appearance_mode("dark")
        ctk.set_default_color_theme("dark-blue")

        self.bg = "#101218"
        self.card = "#1A1E28"
        self.card_2 = "#222837"
        self.text = "#F5F7FB"
        self.muted = "#9BA5B8"
        self.accent = "#8067FF"
        self.accent_hover = "#987FFF"
        self.success = "#238B69"
        self.success_hover = "#32A77F"
        self.danger = "#D55B66"
        self.border = "#30394B"

        self.root.configure(fg_color=self.bg)

        self.correct_numbers = set()
        self.wrong_numbers = set()
        self.history = []
        self.current_guess = None
        self.selected_numbers = set()
        self.attempts = 0
        self.number_buttons = {}

        self.build_ui()
        self.start_new_game()

    # ---------- SOUND ----------

    def play_sound(self, kind):
        if winsound is None:
            return

        try:
            sounds = {
                "select": [(760, 55)],
                "deselect": [(430, 45)],
                "submit": [(560, 60)],
                "error": [(250, 180)],
                "success": [(620, 80), (780, 80), (980, 140)],
            }

            for frequency, duration in sounds.get(kind, []):
                winsound.Beep(frequency, duration)

        except RuntimeError:
            pass

    # ---------- UI ----------

    def build_ui(self):
        main = ctk.CTkFrame(self.root, fg_color=self.bg, corner_radius=0)
        main.pack(fill="both", expand=True, padx=34, pady=28)

        # Header
        header = ctk.CTkFrame(main, fg_color="transparent")
        header.pack(fill="x", pady=(0, 20))

        ctk.CTkLabel(
            header,
            text="KEY SOLVER",
            text_color=self.accent,
            font=ctk.CTkFont(family="Segoe UI", size=11, weight="bold")
        ).pack(anchor="w")

        ctk.CTkLabel(
            header,
            text="5-Number Secret Key",
            text_color=self.text,
            font=ctk.CTkFont(family="Segoe UI", size=29, weight="bold")
        ).pack(anchor="w", pady=(2, 3))

        ctk.CTkLabel(
            header,
            text="Select the numbers that belong to your secret key.",
            text_color=self.muted,
            font=ctk.CTkFont(family="Segoe UI", size=13)
        ).pack(anchor="w")

        # Status card
        status_card = self.make_card(main)
        status_card.pack(fill="x", pady=(0, 14))

        self.status_label = ctk.CTkLabel(
            status_card,
            text="",
            text_color=self.muted,
            font=ctk.CTkFont(family="Segoe UI", size=11, weight="bold")
        )
        self.status_label.pack(anchor="w", padx=20, pady=(16, 2))

        self.confirmed_label = ctk.CTkLabel(
            status_card,
            text="",
            text_color=self.text,
            font=ctk.CTkFont(family="Segoe UI", size=14, weight="bold")
        )
        self.confirmed_label.pack(anchor="w", padx=20, pady=(0, 16))

        # Current guess card
        guess_card = self.make_card(main)
        guess_card.pack(fill="x", pady=(0, 14))

        ctk.CTkLabel(
            guess_card,
            text="CURRENT GUESS",
            text_color=self.accent,
            font=ctk.CTkFont(family="Segoe UI", size=11, weight="bold")
        ).pack(anchor="w", padx=20, pady=(16, 3))

        self.guess_label = ctk.CTkLabel(
            guess_card,
            text="",
            text_color=self.text,
            font=ctk.CTkFont(family="Segoe UI", size=27, weight="bold")
        )
        self.guess_label.pack(anchor="w", padx=20, pady=(0, 16))

        # Selection card
        selection_card = self.make_card(main)
        selection_card.pack(fill="x", pady=(0, 16))

        ctk.CTkLabel(
            selection_card,
            text="SELECT MATCHING NUMBERS",
            text_color=self.accent,
            font=ctk.CTkFont(family="Segoe UI", size=11, weight="bold")
        ).pack(anchor="w", padx=20, pady=(16, 3))

        ctk.CTkLabel(
            selection_card,
            text="Click every number that exists in your secret key.",
            text_color=self.muted,
            font=ctk.CTkFont(family="Segoe UI", size=13)
        ).pack(anchor="w", padx=20, pady=(0, 14))

        self.number_frame = ctk.CTkFrame(
            selection_card,
            fg_color="transparent"
        )
        self.number_frame.pack(anchor="w", padx=20, pady=(0, 18))

        # Bottom controls
        controls = ctk.CTkFrame(main, fg_color="transparent")
        controls.pack(fill="x", pady=(2, 0))

        self.submit_button = ctk.CTkButton(
            controls,
            text="Submit selection",
            command=self.submit_feedback,
            width=185,
            height=42,
            corner_radius=12,
            fg_color=self.accent,
            hover_color=self.accent_hover,
            text_color=self.text,
            font=ctk.CTkFont(family="Segoe UI", size=13, weight="bold")
        )
        self.submit_button.pack(side="left")

        right_controls = ctk.CTkFrame(controls, fg_color="transparent")
        right_controls.pack(side="right")

        ctk.CTkLabel(
            right_controls,
            text="Is this the exact key?",
            text_color=self.muted,
            font=ctk.CTkFont(family="Segoe UI", size=13)
        ).pack(side="left", padx=(0, 10))

        ctk.CTkButton(
            right_controls,
            text="No",
            command=self.not_exact_key,
            width=70,
            height=40,
            corner_radius=12,
            fg_color=self.card_2,
            hover_color=self.border,
            text_color=self.text,
            font=ctk.CTkFont(family="Segoe UI", size=13, weight="bold")
        ).pack(side="left", padx=4)

        ctk.CTkButton(
            right_controls,
            text="Yes",
            command=self.correct_key_found,
            width=70,
            height=40,
            corner_radius=12,
            fg_color=self.success,
            hover_color=self.success_hover,
            text_color=self.text,
            font=ctk.CTkFont(family="Segoe UI", size=13, weight="bold")
        ).pack(side="left", padx=4)

        self.new_game_button = ctk.CTkButton(
            main,
            text="↻  New game",
            command=self.start_new_game,
            width=115,
            height=30,
            corner_radius=10,
            fg_color="transparent",
            hover_color=self.card,
            text_color=self.muted,
            font=ctk.CTkFont(family="Segoe UI", size=12)
        )
        self.new_game_button.pack(anchor="e", pady=(14, 0))

    def make_card(self, parent):
        return ctk.CTkFrame(
            parent,
            fg_color=self.card,
            corner_radius=18,
            border_width=1,
            border_color=self.border
        )

    # ---------- SOLVER ----------

    def start_new_game(self):
        self.correct_numbers = set()
        self.wrong_numbers = set()
        self.history = []
        self.current_guess = None
        self.selected_numbers = set()
        self.attempts = 0
        self.next_guess()

    def get_available_numbers(self):
        return [
            n for n in range(MIN_NUMBER, MAX_NUMBER + 1)
            if n not in self.wrong_numbers
        ]

    def generate_valid_guess(self):
        available = self.get_available_numbers()
        remaining_needed = KEY_SIZE - len(self.correct_numbers)

        extras = [
            n for n in available
            if n not in self.correct_numbers
        ]

        if remaining_needed < 0 or len(extras) < remaining_needed:
            return None

        for _ in range(3000):
            candidate = tuple(sorted(
                self.correct_numbers |
                set(random.sample(extras, remaining_needed))
            ))

            if all(
                matches_constraint(candidate, old_guess, old_selected)
                for old_guess, old_selected in self.history
            ):
                return candidate

        return None

    def choose_next_guess(self):
        valid_guesses = set()

        for _ in range(GUESS_CANDIDATES_TO_TEST):
            guess = self.generate_valid_guess()
            if guess:
                valid_guesses.add(guess)

        if not valid_guesses:
            return None

        tested_numbers = set()
        for old_guess, _ in self.history:
            tested_numbers.update(old_guess)

        return max(
            valid_guesses,
            key=lambda guess: (
                sum(
                    n not in self.correct_numbers and n not in tested_numbers
                    for n in guess
                ),
                random.random()
            )
        )

    def next_guess(self):
        if len(self.correct_numbers) == KEY_SIZE:
            self.show_final_key()
            return

        self.attempts += 1
        self.selected_numbers = set()
        self.current_guess = self.choose_next_guess()

        if self.current_guess is None:
            self.play_sound("error")
            messagebox.showerror(
                "Feedback conflict",
                "No possible key matches all previous feedback."
            )
            return

        self.guess_label.configure(
            text="  ·  ".join(map(str, self.current_guess))
        )

        confirmed = (
            "  ·  ".join(map(str, sorted(self.correct_numbers)))
            if self.correct_numbers else "No numbers confirmed yet"
        )

        self.status_label.configure(text=f"ATTEMPT {self.attempts}")
        self.confirmed_label.configure(text=f"Confirmed: {confirmed}")

        self.create_number_buttons()

    # ---------- INTERACTION ----------

    def create_number_buttons(self):
        for widget in self.number_frame.winfo_children():
            widget.destroy()

        self.number_buttons = {}

        for number in self.current_guess:
            button = ctk.CTkButton(
                self.number_frame,
                text=str(number),
                command=lambda n=number: self.toggle_number(n),
                width=105,
                height=64,
                corner_radius=16,
                fg_color=self.card_2,
                hover_color=self.border,
                text_color=self.text,
                font=ctk.CTkFont(family="Segoe UI", size=20, weight="bold")
            )
            button.pack(side="left", padx=(0, 12))
            self.number_buttons[number] = button

    def toggle_number(self, number):
        button = self.number_buttons[number]

        if number in self.selected_numbers:
            self.selected_numbers.remove(number)
            button.configure(
                fg_color=self.card_2,
                hover_color=self.border
            )
            self.play_sound("deselect")
        else:
            self.selected_numbers.add(number)
            button.configure(
                fg_color=self.success,
                hover_color=self.success_hover
            )
            self.play_sound("select")

    def submit_feedback(self):
        self.play_sound("submit")

        guess_set = set(self.current_guess)
        selected_set = set(self.selected_numbers)

        self.correct_numbers.update(selected_set)
        self.wrong_numbers.update(guess_set - selected_set)
        self.history.append((self.current_guess, selected_set))

        overlap = self.correct_numbers & self.wrong_numbers
        if overlap:
            self.play_sound("error")
            messagebox.showerror(
                "Contradictory feedback",
                "A number was marked correct before but was later not selected:\n\n"
                + ", ".join(map(str, sorted(overlap)))
            )
            return

        self.next_guess()

    def correct_key_found(self):
        self.play_sound("success")
        messagebox.showinfo(
            "Key found",
            f"Key: {list(self.current_guess)}\nAttempts: {self.attempts}"
        )

    def not_exact_key(self):
        messagebox.showinfo(
            "Select matching numbers",
            "Select every number that belongs to your key, then press Submit selection."
        )

    def show_final_key(self):
        self.play_sound("success")
        messagebox.showinfo(
            "All numbers found",
            f"Your key is: {sorted(self.correct_numbers)}\n"
            f"Attempts: {self.attempts - 1}"
        )


if __name__ == "__main__":
    root = ctk.CTk()
    KeyAIGame(root)
    root.mainloop()