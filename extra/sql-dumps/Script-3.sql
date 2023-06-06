-- Create a new database
-- CREATE DATABASE srccode2 LIKE srccode0;
-- GO;
-- of the original and new databases, respectively.
USE srccode2;


-- CREATE TABLE srccode2.Answers AS SELECT * FROM  srccode0.Answers;
-- CREATE TABLE srccode2.Bountues AS SELECT * FROM srccode0.Bounties;
-- CREATE TABLE srccode2.Difficulty AS SELECT * FROM srccode0.Difficulty;
-- CREATE TABLE srccode2.Difficulty_Level AS SELECT * FROM srccode0.Difficulty_Level;
-- CREATE TABLE srccode2.Programming_Language AS SELECT * FROM srccode0.Programming_Language;
-- CREATE TABLE srccode2.Question_Notes AS SELECT * FROM srccode0.Question_Notes;
-- CREATE TABLE srccode2.Question_Programming_Laguage AS SELECT * FROM srccode0.Question_Programming_Language;
-- CREATE TABLE srccode2.Question_Technology_Catagory AS SELECT * FROM srccode0.Question_Technology_Catagory;
-- CREATE TABLE srccode2.Question_Urgency AS SELECT * FROM srccode0.Question_Urgency;
-- CREATE TABLE srccode2.Questions AS SELECT * FROM srccode0.Questions;
-- CREATE TABLE srccode2.Sales AS SELECT * FROM srccode0.Sales;
-- CREATE TABLE srccode2.Technology_Catagory AS SELECT * FROM srccode0.Technology_Catagory;
-- CREATE TABLE srccode2.Users AS SELECT * FROM srccode0.Users;
-- CREATE TABLE srccode2.failed_jobs AS SELECT * FROM srccode0.failed_jobs;
-- CREATE TABLE srccode2.images AS SELECT * FROM srccode0.images;
-- CREATE TABLE srccode2.migrations AS SELECT * FROM srccode0.migrations;
-- CREATE TABLE srccode2.password_reset_tokens AS SELECT * FROM srccode0.password_reset_tokens;
-- CREATE TABLE srccode2.personal_access_tokens AS SELECT * FROM srccode0.personal_access_tokens;
-- CREATE TABLE srccode2.users AS SELECT * FROM srccode0.users;


CREATE TABLE srccode2.Answers LIKE srccode0.Answers;
INSERT srccode2.Answers SELECT * FROM scrcode2.Answers;

CREATE TABLE srccode2.Bounties LIKE srccode0.Bounties
INSERT srccode2.Bounties SELECT * FROM srccode0.Bounties;

CREATE TABLE srccode2.Difficulty LIKE srccode0.Difficulty;
INSERT srccode2.Difficulty SELECT * FROM srccode0.Difficulty;

CREATE TABLE srccode2.Difficulty_Level LIKE srccode0.Difficulty_Level;
INSERT srccode2.Difficulty_Level SELECT * FROM srccode0.Difficulty_Level;

CREATE TABLE srccode2.Programming_Language LIKE srccode0.Programming_Language ;
INSERT srccode2.Programming_Language SELECT * FROM srccode0.Programming_Language;

CREATE TABLE srccode2.Question_Notes LIKE srccode0.Question_Notes;
INSERT srccode2.Question_Notes SELECT * FROM srccode0.Question_Notes;

CREATE TABLE srccode2.Question_Programming_Laguage LIKE srccode0.Question_Programming_Language;
INSERT srccode2.Question_Programming_Laguage SELECT * FROM srccode0.Question_Programming_Language;

CREATE TABLE srccode2.Question_Technology_Catagory LIKE srccode0.Question_Technology_Catagory; 
INSERT srccode2.Question_Technology_Catagory SELECT * FROM srccode0.Question_Technology_Catagory;

CREATE TABLE srccode2.Question_Urgency LIKE srccode0.Question_Urgency;
INSERT srccode2.Question_Urgency SELECT * FROM srccode0.Question_Urgency;

CREATE TABLE srccode2.Questions LIKE srccode0.Questions;
INSERT srccode2.Questions SELECT * FROM srccode0.Questions;

CREATE TABLE srccode2.Sales LIKE srccode0.Sales;
INSERT srccode2.Sales SELECT * FROM srccode0.Sales;

CREATE TABLE srccode2.Technology_Catagory LIKE srccode0.Technology_Catagory; 
INSERT srccode2.Technology_Catagory SELECT * FROM srccode0.Technology_Catagory;

CREATE TABLE srccode2.Users LIKE srccode0.Users; 
INSERT srccode2.Users SELECT * FROM srccode0.Users;

CREATE TABLE srccode2.failed_jobs LIKE srccode0.failed_jobs;
INSERT srccode2.failed_jobs SELECT * FROM srccode0.failed_jobs;

CREATE TABLE srccode2.images LIKE srccode0.images;
INSERT srccode2.images SELECT * FROM srccode0.images;

CREATE TABLE srccode2.migrations LIKE srccode0.migrations;
INSERT srccode2.migrations SELECT * FROM srccode0.migrations;

CREATE TABLE srccode2.password_reset_tokens LIKE srccode0.password_reset_tokens;
INSERT srccode2.password_reset_tokens SELECT * FROM srccode0.password_reset_tokens;

-- CREATE TABLE srccode2.personal_access_tokens LIKE srccode0.personal_access_tokens; 
-- INSERT srccode2.personal_access_tokens SELECT * FROM srccode0.personal_access_tokens;

CREATE TABLE srccode2.users LIKE srccode0.users;
INSERT srccode2.users SELECT * FROM srccode0.users;


-- Copy each table to the new database

-- CREATE TABLE new_database.new_table AS SELECT * FROM original_database.original_table;

-- CREATE TABLE srccode2.Answers AS SELECT * FROM  srccode0.Answers;
-- CREATE TABLE srccode2.Bountues AS SELECT * FROM srccode0.Bounties;
-- CREATE TABLE srccode2.Difficulty AS SELECT * FROM srccode0.Difficulty;
-- CREATE TABLE srccode2.Difficulty_Level AS SELECT * FROM srccode0.Difficulty_Level;
-- CREATE TABLE srccode2.Programming_Language AS SELECT * FROM srccode0.Programming_Language;
-- CREATE TABLE srccode2.Question_Notes AS SELECT * FROM srccode0.Question_Notes;
-- CREATE TABLE srccode2.Question_Programming_Laguage AS SELECT * FROM srccode0.Question_Programming_Language;
-- CREATE TABLE srccode2.Question_Technology_Catagory AS SELECT * FROM srccode0.Question_Technology_Catagory;
-- CREATE TABLE srccode2.Question_Urgency AS SELECT * FROM srccode0.Question_Urgency;
-- CREATE TABLE srccode2.Questions AS SELECT * FROM srccode0.Questions;
-- CREATE TABLE srccode2.Sales AS SELECT * FROM srccode0.Sales;
-- CREATE TABLE srccode2.Technology_Catagory AS SELECT * FROM srccode0.Technology_Catagory;
-- CREATE TABLE srccode2.Users AS SELECT * FROM srccode0.Users;
-- CREATE TABLE srccode2.failed_jobs AS SELECT * FROM srccode0.failed_jobs;
-- CREATE TABLE srccode2.images AS SELECT * FROM srccode0.images;
-- CREATE TABLE srccode2.migrations AS SELECT * FROM srccode0.migrations;
-- CREATE TABLE srccode2.password_reset_tokens AS SELECT * FROM srccode0.password_reset_tokens;
-- CREATE TABLE srccode2.personal_access_tokens AS SELECT * FROM srccode0.personal_access_tokens;
-- CREATE TABLE srccode2.users AS SELECT * FROM srccode0.users;

-- CREATE TABLE users_n_indexed LIKE users_master;
-- INSERT users_n_indexed SELECT * FROM users_n;

-- CREATE TABLE users_n_indexed LIKE users_master;
-- INSERT users_n_indexed SELECT * FROM users_master;










