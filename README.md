# File Transfer Project

This project enables file transfer via HTML using XAMPP. Below are the instructions for installation and setup.

## Installation Instructions

### Step 1: Download and Install XAMPP

1. Visit the [XAMPP website](https://www.apachefriends.org/index.html) and download the latest version suitable for your operating system (Windows, macOS, or Linux).
2. Follow the installation instructions provided by XAMPP to install the software on your system.
3. Make sure to remember the directory where XAMPP is installed, as you will need it later.

### Step 2: Clone or Download Project Files

1. Clone this repository or download the project files to your local machine.
2. Extract the downloaded files if necessary.

### Step 3: Configure XAMPP

1. Navigate to the directory where XAMPP is installed. Typically, this is `C:\xampp` on Windows, `/Applications/XAMPP` on macOS, or `/opt/lampp` on Linux.
2. Start XAMPP by running the `xampp-control` executable.
3. Once XAMPP Control Panel is open, start the Apache server by clicking the "Start" button next to "Apache".

### Step 4: Move Project Files to XAMPP Directory

1. Move or copy the project files (`download_selected.php`, `filelist.php`, `index.html`, `index.php`, `list_files.php`, `pdf_viewer.html`, `upload.php`, `view.html`, `view.php`) to the `htdocs` directory inside your XAMPP installation.
   - On Windows, this is typically located at `C:\xampp\htdocs`.
   - On macOS, it's at `/Applications/XAMPP/xamppfiles/htdocs`.
   - On Linux, it's at `/opt/lampp/htdocs`.
2. Ensure that the files are placed directly in the `htdocs` directory, not within any subdirectories.

### Step 5: Access the Project

1. Open your web browser.
2. In the address bar, type `http://localhost/` and press Enter.
3. You should see a list of files and directories. Your project files should be accessible from here.

## Usage

- `index.html`: Main page of the file transfer project.
- `upload.php`: Allows users to upload files.
- `list_files.php`: Lists all the files uploaded.
- `download_selected.php`: Allows users to download selected files.
- `pdf_viewer.html`: Displays PDF files.
- `view.php`: Displays images or text files.
- `filelist.php`: Helper script to retrieve file list.

Feel free to customize or extend this project according to your requirements.

