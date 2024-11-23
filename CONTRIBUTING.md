# Contribution Guidelines

## Coding Standards

- Follow [PSR-12 Coding Standards](https://www.php-fig.org/psr/psr-12/).
- **Classes:** PascalCase (e.g., `UserManager`).
- **Methods and Variables:** camelCase (e.g., `getUserData`).
- **Constants:** UPPER_SNAKE_CASE (e.g., `MAX_USERS`).
- **Indentation:** 4 spaces, no tabs.
- **Database Variables:** snake_case (e.g., `annee_etude`)

## File and Directory Structure

- Group files by functionality:
  - `app/` for core logic (e.g., Models, Controllers).
  - `views/` for user interfaces.
  - `public/` for web-accessible files (`index.php`).

## Code Reviews

- Create a pull request (PR) for every contribution.
- Include meaningful commit messages.
- Ensure your code is properly documented using comments.
