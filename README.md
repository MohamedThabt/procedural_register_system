# Simple Register System

This project is a straightforward registration system built using procedural PHP programming. It demonstrates basic user authentication functionalities with both client-side and server-side validation.

## Features

- User Registration
- User Login
- Client-side form validation
- Server-side form validation

## Technologies Used

### Frontend
- HTML5
- CSS3
- Font Awesome (for icons)

### Backend
- PHP (Procedural)
- MySQL

*Add a screenshot of your project here. Replace 'link_to_your_demo_image.jpg' with the actual link to your image.*

## Installation

1. Clone the repository
   ```
   git clone https://github.com/MohamedThabt/procedural_register_system.git
   ```
2. Set up a local web server (e.g., Apache) and ensure PHP is installed
3. Create a MySQL database for the project
4. Import the provided SQL file to set up the necessary tables
5. Update the database connection details in the configuration file (typically `config.php`)
6. Navigate to the project directory in your web browser

## Usage
1. Access the registration page to create a new account
   - Fill in the required fields
   - The form will validate inputs on the client-side before submission
2. Once registered, you can log in using your credentials
   - The login form also includes client-side validation
3. Both registration and login processes include server-side validation for enhanced security

## Project Structure

```
simple-register-system/
│
├── index.php          # Landing page
├── register.php       # Registration page
├── login.php          # Login page
├── config.php         # Database configuration
├── functions.php      # Helper functions
├── css/
│   └── style.css      # Custom styles
├── js/
│   └── validation.js  # Client-side validation scripts
└── README.md          # Project documentation
```

## Security Considerations

- Passwords are hashed before storing in the database
- Input sanitization is implemented to prevent SQL injection
- CSRF protection is included in forms

## Future Enhancements

- Implement password reset functionality
- Add email verification for new registrations
- Create a user profile page

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open source and available under the [MIT License](LICENSE).
