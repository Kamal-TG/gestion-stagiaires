# ISTA Trainee Management Application

## Overview

This project is a web application designed to manage the trainees of ISTA (Institut Spécialisé de Technologie Appliquée). The application includes the following features:

1. Add a new trainee.
2. View trainee details.
3. Edit trainee details.
4. List trainees by department and academic year.
5. A menu page for navigating the application.

The application will use a database named `ISTA`, which contains a table `Stagiaires` with the following structure:

**Table: `Stagiaires`**

- `id`: Trainee ID (primary key)
- `nom`: Last name of the trainee
- `prenome`: First name of the trainee
- `filierere`: Department or specialization
- `annee_etude`: Academic year
- `type_bac`: Type of high school diploma
- `annee_bac`: Year of obtaining the diploma of bac

---

### Collaboration Guidelines:

- The team will use **Git** and **GitHub** for version control to ensure effective collaboration.
- Developers can work on the same file or different files simultaneously.
- Regular commits and pull requests are encouraged to track progress and resolve conflicts efficiently.
- For detailed contribution guidelines, please refer to the [CONTRIBUTING.md](CONTRIBUTING.md) file.

---

## Features

1. **Add a Trainee**

   - A form to input the trainee's details, including their ID, name, specialization, and academic year.
2. **View Trainee Details**

   - A detailed view page to display all information about a selected trainee.
3. **Edit Trainee Details**

   - A page to modify a trainee's information and save updates to the database.
4. **List Trainees by Department and Year**

   - A filtered view showing trainees grouped by their department and academic year.
5. **Main Menu Page**

   - A central menu to navigate through the application's features.

---

## Getting Started

### Prerequisites

- PHP >= 8
- MySQL
- A web server (Tested on Apache)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Kamal-TG/gestion-stagiaires
   ```
2. Navigate to the project directory:
   ```bash
   cd gestion-stagiaires
   ```
3. Running the Application
   ```bash
   php -S localhost:8000 -t public/
   ```
