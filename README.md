# Mobile Events API

A simple, lightweight **RESTful API** for managing events with full **CRUD** operations and MySQL database backend.

## Features

- Create new events
- List all events
- Get single event details
- Update existing events
- Delete events
- Basic input validation & error handling
- Clean separation of concerns

## Tech Stack

- **PHP** ≥ 7.4 / 8.x
- **MySQL** 
- JSON API responses

## Project Structure
## Project Structure

```text
Mobile-Events-API/
├── actions/
│   ├── create.php        # POST   - Create new event
│   ├── read_all.php      # GET    - List all events
│   ├── read_one.php      # GET    - Get single event by ID
│   ├── update.php        # PUT    - Update event
│   └── delete.php        # DELETE - Remove event
├── config.php            # Database credentials & settings
├── database.php          # Database connection & PDO instance
└── README.md
