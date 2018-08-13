<?
/* 
(many to many)

*authors
id | fname | lname  |
---|-------|--------|
1  | Neil  | Gaiman |

*books
id | title         |
---|---------------|
1  | American Gods |

*authors_books
id | author_id | book_id |
---|-----------|---------|
1  | 1         | 1       |

*SQL query for retrieving books written by 3-x co writers

SELECT title
FROM books
LEFT JOIN
  (SELECT book_id
   FROM authors_books
   GROUP BY book_id
   HAVING COUNT(author_id) > 2) foo ON books.id = foo.book_id
WHERE books.id = foo.book_id;
*/
?>