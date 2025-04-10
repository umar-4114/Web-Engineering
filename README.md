# Faculty Feedback System

A web-based system for collecting, storing, and viewing student feedback on faculty teaching performance.

## Overview

This application allows students to submit feedback for faculty members, rating various aspects of their teaching performance. The feedback data is stored in a MySQL database and can be viewed through a simple interface.

## Features

- **Student feedback form with validation**
- **Faculty, subject, and delivery method selection**
- **Rating system for multiple teaching aspects (1-3 scale)**
- **Database storage of all feedback submissions**
- **View page to display all submitted feedback**

## Files Structure

- `index.html`: Main feedback form with JavaScript validation
- `process.php`: Processes form submissions and stores data in the database
- `view.php`: Displays all submitted feedback records

## Requirements

- PHP 7.0+
- MySQL/MariaDB
- Web server (Apache, Nginx, etc.)

## Installation

1. Clone this repository to your web server's document root or desired subdirectory.
   
   ```bash
   git clone <repository_url>
