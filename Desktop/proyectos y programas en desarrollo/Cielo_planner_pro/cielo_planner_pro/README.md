# Cielo Planner Pro

Cielo Planner Pro is a web application designed for Christian organizations in the Dominican Republic, including churches, ministries, and speakers. This application facilitates various functionalities such as event management, member management, donations, internal communication, and multimedia resources.

## Features

- **Event Management**: Create, update, and delete events with an interactive calendar.
- **Member Management**: Manage member data, including registration and group assignments.
- **Donations**: Secure online donation platform with tracking and reporting features.
- **Internal Communication**: Integrated communication tools for emails, SMS, and notifications.
- **Multimedia Resources**: A library for managing and accessing multimedia content such as sermons and audiovisual materials.
- **Report Generation**: Generate reports and statistics related to attendance and finances.
- **Data Security**: Ensures secure handling of sensitive information.
- **Responsive Design**: Optimized for various devices and screen sizes.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```
   cd cielo_planner_pro
   ```
3. Set up the database:
   - Import the `database/schema.sql` file into your MySQL database.
4. Configure the database connection:
   - Edit the `src/config/database.php` file with your database credentials.
5. Install PHP dependencies using Composer:
   ```
   composer install
   ```
6. Start the local server:
   ```
   php -S localhost:8000 -t public
   ```
7. Access the application in your web browser at `http://localhost:8000`.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any enhancements or bug fixes.

## License

This project is licensed under the MIT License. See the LICENSE file for details.