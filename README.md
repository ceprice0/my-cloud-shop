# CloudCart

CloudCart is a small PHP e-commerce demonstration for Azure App Service and
Azure SQL Database. It includes a product catalogue, a sample cart and order
tracking view, customer registration, and basic customer analytics.

## Configuration

The application uses the Microsoft `sqlsrv` PHP extension. Configure the
database connection through environment variables rather than committing
credentials to the repository:

```text
DB_SERVER=tcp:your-server.database.windows.net,1433
DB_NAME=your-database
DB_USER=your-user
DB_PASSWORD=your-password
```

Set these values as **App Service > Configuration > Application settings** in
Azure, then save and restart the app. The registration page will not connect
until all four settings are present:

- `DB_SERVER`: `tcp:an-sql-server1.database.windows.net,1433`
- `DB_NAME`: `calumsdatabase`
- `DB_USER`: your Azure SQL login
- `DB_PASSWORD`: your Azure SQL password

For local development, use the equivalent environment variables in the PHP
runtime. Never commit the password or place it in a PHP file.

The `shopusers` table must contain `id`, `name`, `email`, `password`, and
`created_at` columns. The `Products` table must contain `ProductName`, `Price`,
and `StockQuantity` columns.

## Running locally

1. Enable the `sqlsrv` and `pdo_sqlsrv` PHP extensions.
2. Set the database environment variables above.
3. Start the PHP development server from this directory:

```bash
php -S localhost:8000
```

Open `http://localhost:8000` in a browser.