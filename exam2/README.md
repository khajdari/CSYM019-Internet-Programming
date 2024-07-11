# Installation Steps

1. Install `xampp\lampp`;
2. create a new database with name: `university`
3. Edit `/config/db.php` accordingly. ex (address, name, port, password)
4. cd into exam2 directory
5. Migrate database data using `/data/university.sql` migration script
6. Run the server: & `C:\xampp\php\php.exe -S localhost:8000`

# For phpMyAdmin
1. Select `university` database
2. Go to `import` tab
3. File to import --> select `/data/university.sql` file.


# First Login to the System

Use the default user:
email: `admin@test.com`
password: `admin`