# Generic_Code_Obfuscator
Generic_Code_Obfuscator in PHP using Jarir's Odd Even Algorithm.

# Uses: 
Supports all languages.

# Jarir's Odd Even Algorithm:

# Obfuscation:

1. If a character is in a line where the line number is even and the character number is even shift the character forward to  4 positions For example, A goes to E , B goes to F etc.
2. If a character is in a line where the line number is odd and the character number is even shift the character forward to  3 positions For example, A goes to D , B goes to E etc.
3.If a character is in a line where the line number is even and the character number is odd shift the character forward to  5 positions For example, A goes to F , B goes to G etc.
4. If a character is in a line where the line number is odd and the character number is odd shift the character forward to  1 position For example, A goes to B , B goes to C etc.

# Decoding:

1. If a character is in a line where the line number is even and the character number is even, shift the character backward by 4 positions. For example, E goes to A, F goes to B, etc.
2. If a character is in a line where the line number is odd and the character number is even, shift the character backward by 3 positions. For example, D goes to A, E goes to B, etc.
3. If a character is in a line where the line number is even and the character number is odd, shift the character backward by 5 positions. For example, F goes to A, G goes to B, etc.
4. If a character is in a line where the line number is odd and the character number is odd, shift the character backward by 1 position. For example, B goes to A, C goes to B, etc.
