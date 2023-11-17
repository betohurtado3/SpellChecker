# OCR and Spell-Checking Script

## Overview

This script provides functionality to upload an image, extract text using Optical Character Recognition (OCR), and perform spell-checking in both English and Spanish. It supports both PHP and Python implementations.

## Features

1. **Image Upload:** Allows users to upload an image file.
2. **OCR Processing:** Extracts text from the uploaded image using Tesseract OCR.
3. **Spell-Checking:** Identifies and corrects misspellings in the extracted text for both English and Spanish.
4. **Result Display:** Outputs the original text, English-corrected text, and Spanish-corrected text.

## PHP Implementation

### Requirements

- Tesseract OCR installed on the server.
- Aspell installed on the server.

### How to Use

1. Upload an image file using a form.
2. The script extracts text from the image using Tesseract OCR.
3. Spell-checking is performed in both English and Spanish using Aspell.
4. The original text, English-corrected text, and Spanish-corrected text are displayed.

### Example Usage

```php
// Example form for image upload
<form action="process_image.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*">
    <input type="submit" value="Upload Image">
</form>
