CREATE TABLE IF NOT EXISTS `skills_data_fr` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `pie_labels` JSON NOT NULL,
    `pie_data` JSON NOT NULL,
    `bar_labels` JSON NOT NULL,
    `bar_data` JSON NOT NULL
);
INSERT INTO `skills_data_fr` (`pie_labels`, `pie_data`, `bar_labels`, `bar_data`)
VALUES
(
    '["Développeuse", "Chanteuse", "Maniaque du contrôle", "Raton laveur réincarné"]', 
    '[60, 10, 20, 10]', 
    '["HTML/CSS", "JavaScript/React", "Consommation de thé", "PHP", "NodeJs/ExpressJS", "Bulma", "Jeux / vidéos", "Insulter mon /ordinateur"]', 
    '[80, 70, 95, 68, 70, 55, 85, 100]'
);
