# Write your MySQL query statement below

SELECT emp.name AS Employee FROM Employee AS emp
JOIN Employee As man
ON emp.managerId = man.id
WHERE emp.salary > man.salary;