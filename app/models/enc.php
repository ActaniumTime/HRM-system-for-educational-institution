<?php

class Enigma {
    private array $rotorsUpper;
    private array $rotorsLower;
    private array $reflectorUpper;
    private array $reflectorLower;
    private array $rotorPositions;
    private array $alphabetUpper;
    private array $alphabetLower;

    public function __construct() {

        $this->alphabetUpper = range('A', 'Z');
        $this->alphabetLower = range('a', 'z');

        $this->rotorsUpper = [
            array_combine($this->alphabetUpper, str_split('EKMFLGDQVZNTOWYHXUSPAIBRCJ')),
            array_combine($this->alphabetUpper, str_split('AJDKSIRUXBLHWTMCQGZNPYFVOE')),
            array_combine($this->alphabetUpper, str_split('BDFHJLCPRTXVZNYEIWGAKMUSQO'))
        ];

        $this->rotorsLower = [
            array_combine($this->alphabetLower, str_split('ekmflgdqvzntowyhxuspaibrcj')),
            array_combine($this->alphabetLower, str_split('ajdksiruxblhwtmcqgznpyfvoe')),
            array_combine($this->alphabetLower, str_split('bdfhjlcprtxvznyeiwgakmusqo'))
        ];

        $this->reflectorUpper = array_combine($this->alphabetUpper, str_split('YRUHQSLDPXNGOKMIEBFZCWVJAT'));
        $this->reflectorLower = array_combine($this->alphabetLower, str_split('yruhqsldpxngokmiebfzcwvjat'));

        $this->rotorPositions = [0, 0, 0];
    }

    private function encryptChar(string $char): string {
        if (in_array($char, $this->alphabetUpper)) {
            $rotors = $this->rotorsUpper;
            $reflector = $this->reflectorUpper;
        } elseif (in_array($char, $this->alphabetLower)) {
            $rotors = $this->rotorsLower;
            $reflector = $this->reflectorLower;
        } else {
            return $char; 
        }

        $this->rotateRotors();

        $char = $this->passThroughRotors($char, $rotors, true);

        $char = $reflector[$char];

        $char = $this->passThroughRotors($char, $rotors, false);

        return $char;
    }

    private function passThroughRotors(string $char, array $rotors, bool $forward): string {
        if ($forward) {
            for ($i = 0; $i < 3; $i++) {
                $char = $rotors[$i][$char];
            }
        } else {
            for ($i = 2; $i >= 0; $i--) {
                $char = array_search($char, $rotors[$i]);
            }
        }
        return $char;
    }

    private function rotateRotors(): void {
        $this->rotorPositions[0]++;
        if ($this->rotorPositions[0] % 26 === 0) {
            $this->rotorPositions[1]++;
            if ($this->rotorPositions[1] % 26 === 0) {
                $this->rotorPositions[2]++;
            }
        }
    }

    public function encrypt(string $message): string {
        $encryptedMessage = '';
        foreach (str_split($message) as $char) {
            $encryptedMessage .= $this->encryptChar($char);
        }
        return $encryptedMessage;
    }
}
