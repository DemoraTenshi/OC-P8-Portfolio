CREATE TABLE facts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,         -- Pour le titre du fait
    content TEXT NOT NULL,               -- Pour le texte du fait
    emoji VARCHAR(30)                    -- Pour l'emoji représentant le fait
);
INSERT INTO facts (title, content, emoji) VALUES 
('Lifelong IT enthusiast', 'I''ve always had a passion for IT and technology. When I was a child, I used to dismantle all broken devices to understand how they worked. Spoiler: I could never fix them....', '💻 🛠️'),
('Bookhoarder', 'Like a dragons with gold, I hoard books. You can never have too many books!', '📚 🐉'),
('Totem animal', 'The raccoon is my totem animal; I have dark circle, eat trash, cut but will fight!', '🦝'),
('Bribeable by food','In addition to books, I''m easily bribed with food - especially chocolate and shortbreads.','🍫 🥠' ),
('Forget to eat','I regularly forget to eat when I''m working - that''s why I can be easily food bribed.','😅🤫'),
('Scottish elopement','My husband and I eloped to Scotland to get married to avoid a ceremony with over 150 people.','󠁧󠁢󠁳💍🏴󠁧󠁢󠁳󠁣󠁴󠁿'),
('Tea consumption','I have a problematic tea drinking habit - 7 cups a day seems to be consider as excessive...','🫖🍵'),
('Feline heating pad','I use my hairless cat as a heating pad in my sweater when I''m working - no, I''m not ashamed.','🙀😽'),
('Granny hobbies','Don''t tell anyone, but I love knitting and crocheting...shhh!','👵🧶');
