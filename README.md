An efficient tree-based data structure for detecting duplicate number values in fixed-length strings (e.g. phone numbers, national IDs, account numbers, etc.).

✨ Features

  1. Fast: Detects duplicates in O(n) time complexity
  
  2. Memory Efficient: Uses only O(d × L) memory (d = distinct strings, L = fixed length)
  
  3. Simple and Clean
  
  4. Zero Dependencies: No external libraries required
  
  5. PHP 8.0+ Compatible

📦 Installation

      composer require alireza_malekei/number-expansion-tree:dev-main

🚀 Usage

  Basic Example
    
      use Module\CircularChain;
      
      // List of phone numbers (fixed length: 10 digits)
      $phones = [
          '09138332910',
          '09135633375',
          '09138332910',
          '09138332910',
          '09135633375',
          '09121001010'
      ];
      
      $chain = new CircularChain(10); // Fixed length = 10

      $chain->handle($phones);

  Total Count
  
      $chain->totalCount;
      
  Output:

      6

Repeating Count

    $chain->repeatingCount;
      
Output:

      3
Sole Count

    $chain->soleCount;

Output:

      3
      
Repeating Entries

    $chain->repeating;

Output:

    09138332910
    09138332910
    09135633375
    
  Sole Entries
  
    $chain->soles:
      
  Output:

    09138332910
    09135633375
    09121001010

👤 Author
  
Alireza Maleki

GitHub: @alirezaMalekei

Packagist: alireza-malekei

⭐ If this package helped you

Please give it a star ⭐ on GitHub so others can discover it too.
      
