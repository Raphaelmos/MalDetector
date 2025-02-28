# Malicious URL Detector

## Overview
The Malicious URL Detector is a simple web application that allows users to check whether a given URL is safe or potentially harmful. This project uses the VirusTotal API to analyze URLs and determine their safety status.

## Features
- Enter a URL to be scanned for malicious content.
- Get instant results indicating whether the URL is safe or has been flagged as malicious.
- User-friendly interface for easy interaction.

## Technologies Used
- **HTML**: For the structure of the web page.
- **PHP**: For server-side handling and API interactions.
- **CSS**: For styling the web page.
--**JS**: For getting it all together.

### Prerequisites
- A web server with PHP support (e.g., WAMP, or a live server).
- A [VirusTotal API key]

### Installation
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Raphaelmos/MalDetector.git
   cd MalDetector
   ```

2. **Set Up the VirusTotal API Key**:
   - Open the `VIrusTotalAPI.php` file.
   - Replace `YOUR_API_KEY` with your actual VirusTotal API key.

3. **Run the Application**:
   - Place the entire project folder in your web server's root directory.
   - Access the application in your web browser at `http://localhost/MalDetector/index.html`.

## How to Use
1. Open the Malicious URL Detector in your web browser.
2. Enter a URL you want to check in the text input field.
3. Click the "Scan URL" button.
4. View the results displayed on the page.

## Example
- Enter: `http://example.com`
- Result: "URL is safe: 0 detections."
