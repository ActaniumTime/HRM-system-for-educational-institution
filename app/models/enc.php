<?php

class Enigma {
    private array $rotors;
    private array $reflector;
    private array $rotorPositions;
    private array $alphabet;

    public function __construct() {
        // Алфавит
        $this->alphabet = range('A', 'Z');

        // 3 ротора (перестановка алфавита)
        $this->rotors = [
            array_combine($this->alphabet, str_split('EKMFLGDQVZNTOWYHXUSPAIBRCJ')),
            array_combine($this->alphabet, str_split('AJDKSIRUXBLHWTMCQGZNPYFVOE')),
            array_combine($this->alphabet, str_split('BDFHJLCPRTXVZNYEIWGAKMUSQO'))
        ];

        // Отражатель (статический)
        $this->reflector = array_combine($this->alphabet, str_split('YRUHQSLDPXNGOKMIEBFZCWVJAT'));

        // Начальные позиции роторов
        $this->rotorPositions = [0, 0, 0];
    }

    // Шифрование одного символа
    private function encryptChar(string $char): string {
        if (!in_array($char, $this->alphabet)) {
            return $char; // Пропуск неалфавитных символов
        }

        // Проворачиваем роторы
        $this->rotateRotors();

        // Проход через роторы (прямой)
        $char = $this->passThroughRotors($char, true);

        // Проход через отражатель
        $char = $this->reflector[$char];

        // Обратный проход через роторы
        $char = $this->passThroughRotors($char, false);

        return $char;
    }

    // Обработка роторных преобразований
    private function passThroughRotors(string $char, bool $forward): string {
        if ($forward) {
            for ($i = 0; $i < 3; $i++) {
                $char = $this->rotors[$i][$char];
            }
        } else {
            for ($i = 2; $i >= 0; $i--) {
                $char = array_search($char, $this->rotors[$i]);
            }
        }
        return $char;
    }

    // Проворот роторов
    private function rotateRotors(): void {
        $this->rotorPositions[0]++;
        if ($this->rotorPositions[0] % 26 === 0) {
            $this->rotorPositions[1]++;
            if ($this->rotorPositions[1] % 26 === 0) {
                $this->rotorPositions[2]++;
            }
        }
    }

    // Шифрование текста
    public function encrypt(string $message): string {
        $message = strtoupper($message);
        $encryptedMessage = '';
        foreach (str_split($message) as $char) {
            $encryptedMessage .= $this->encryptChar($char);
        }
        return $encryptedMessage;
    }
}

