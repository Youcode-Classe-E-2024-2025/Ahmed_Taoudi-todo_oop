-- Insert Users (from Egypt)
insert into user (username, useremail, userpassword) values
('Ahmed ElShenawy', 'ahmed.shenawy@example.com', 'password123'),
('Mona Ahmed', 'mona.ahmed@example.com', 'securepassword'),
('Mohamed Ali', 'mohamed.ali@example.com', '12345password'),
('Sara Mostafa', 'sara.mostafa@example.com', 'mypassword2024'),
('Tamer Hossam', 'tamer.hossam@example.com', 'tamerpass'),
('Dina Fouad', 'dina.fouad@example.com', 'strongpassword'),
('Amr Salah', 'amr.salah@example.com', 'amrpassword1'),
('Reem Khaled', 'reem.khaled@example.com', 'reemstrongpass'),
('Omar Ibrahim', 'omar.ibrahim@example.com', 'omar1234'),
('Nadia Zaki', 'nadia.zaki@example.com', 'secureNadia123'),
('Hassan Saeed', 'hassan.saeed@example.com', 'hassanpass'),
('Mariam Youssef', 'mariam.youssef@example.com', 'mariamsecure'),
('Mohamed Taha', 'mohamed.taha@example.com', 'tahapassword456'),
('Fatima Ismail', 'fatima.ismail@example.com', 'fatimapassword'),
('Khaled ElSayed', 'khaled.elsayed@example.com', 'khaled1234');


-- Insert Tasks
insert into task (taskname, taskdesc, taskstatus, taskstart, taskfin) values
('Fix login bug', 'Fix the issue where users cannot log in', 'TODO', '2024-12-20 10:00:00', NULL),
('Add user registration form', 'Implement a registration form for new users', 'DOING', '2024-12-15 09:00:00', NULL),
('Update homepage design', 'Improve the design of the homepage', 'DONE', '2024-12-01 08:00:00', '2024-12-05 16:00:00'),
('Create search functionality', 'Add search bar functionality for the website', 'TODO', '2024-12-18 11:30:00', NULL),
('Fix CSS bugs', 'Fix layout issues on mobile', 'DOING', '2024-12-22 14:00:00', NULL),
('Implement dark mode', 'Add dark mode feature for the site', 'TODO', '2024-12-25 09:00:00', NULL),
('Optimize performance', 'Improve the performance of the website', 'DOING', '2024-12-21 13:00:00', NULL),
('Add profile page', 'Create a user profile page for logged-in users', 'TODO', '2024-12-26 15:30:00', NULL),
('Refactor homepage JS', 'Refactor the homepage JavaScript for better performance', 'DONE', '2024-12-01 10:00:00', '2024-12-02 18:00:00'),
('Add payment gateway', 'Integrate a payment gateway for online payments', 'DOING', '2024-12-22 09:00:00', NULL);



-- Insert Collaboration Data (User Assignments to Tasks)
insert into collaboration (user_id, task_id) values
(1, 1), -- Ahmed ElShenawy assigned to task 1 (Fix login bug)
(2, 2), -- Mona Ahmed assigned to task 2 (Add user registration form)
(3, 3), -- Mohamed Ali assigned to task 3 (Update homepage design)
(4, 4), -- Sara Mostafa assigned to task 4 (Create search functionality)
(5, 5), -- Tamer Hossam assigned to task 5 (Fix CSS bugs)
(6, 6), -- Dina Fouad assigned to task 6 (Implement dark mode)
(7, 7), -- Amr Salah assigned to task 7 (Optimize performance)
(8, 8), -- Reem Khaled assigned to task 8 (Add profile page)
(9, 9), -- Omar Ibrahim assigned to task 9 (Refactor homepage JS)
(10, 10), -- Nadia Zaki assigned to task 10 (Add payment gateway)
(1, 6), -- Ahmed ElShenawy also assigned to task 6 (Implement dark mode)
(3, 4), -- Mohamed Ali also assigned to task 4 (Create search functionality)
(4, 7), -- Sara Mostafa also assigned to task 7 (Optimize performance)
(6, 8), -- Dina Fouad also assigned to task 8 (Add profile page)
(10, 9); -- Nadia Zaki also assigned to task 9 (Refactor homepage JS)
