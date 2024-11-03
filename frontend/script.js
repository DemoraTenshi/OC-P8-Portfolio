document.addEventListener("DOMContentLoaded", function() {
    const currentPage = new URLSearchParams(window.location.search).get('page') || 'home';

    // Active nav-link
    const navLinks = document.querySelectorAll('.nav-link');

    // Fonction pour activer le lien en fonction de l'URL
    function setActiveLink() {
        navLinks.forEach(link => {
            const linkPage = link.getAttribute('href').split('=')[1]; // Récupérer la page à partir de l'attribut href
            if (linkPage === currentPage) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    // Initialisation de l'état des liens à la charge de la page
    setActiveLink();

    // Gestion des clics sur les liens
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Retire la classe 'active' de tous les liens
            navLinks.forEach(nav => nav.classList.remove('active'));
            // Ajoute la classe 'active' à celui qui a été cliqué
            this.classList.add('active');
        });
    });

    // dark/light mode toggle
    const toggleSwitch = document.getElementById('darkModeToggle');
    const illustration = document.getElementById('illustration');

    if (toggleSwitch && illustration) {
        // Récupérer les chemins des images depuis les attributs data
        const lightImage = illustration.getAttribute('data-light');
        const darkImage = illustration.getAttribute('data-dark');

        // Vérifiez l'état du mode sombre dans localStorage
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            illustration.src = darkImage; // Utiliser l'image sombre
            toggleSwitch.checked = true; // Cocher le toggle switch
        }

        // Écoutez les changements sur le switch
        toggleSwitch.addEventListener('change', () => {
            document.body.classList.toggle('dark-mode');

            if (document.body.classList.contains('dark-mode')) {
                // Change l'illustration pour le mode sombre
                illustration.src = darkImage; // Utiliser la variable darkImage
                localStorage.setItem('darkMode', 'enabled'); // Stocke l'état du mode sombre
            } else {
                // Change l'illustration pour le mode clair
                illustration.src = lightImage; // Utiliser la variable lightImage
                localStorage.setItem('darkMode', 'disabled'); // Stocke l'état du mode clair
            }
        });
    }

    // Random facts code (uniquement pour la page home)
    if (currentPage === 'home') {
        const randomFactsDiv = document.querySelector('.random-facts');
        if (randomFactsDiv) {
            async function fetchRandomFact() {
                try {
                    const response = await fetch('backend/random_fact.php');
                    const fact = await response.json();

                    // Mise à jour des éléments spécifiques
                    document.querySelector('.fact-title').textContent = fact.title; // Met à jour le titre
                    document.querySelector('.fact-content').textContent = fact.content; // Met à jour le contenu
                    document.querySelector('.fact-emoji').textContent = fact.emoji; // Met à jour l'emoji

                    // Optionnel : ajouter une classe active pour le contenu
                    const factContentElement = document.querySelector('.fact-content');
                    factContentElement.classList.add('active');

                } catch (error) {
                    console.error("Erreur lors de la récupération du fait :", error);
                }
            }

            // Appel initial et rafraîchissement toutes les 20 secondes
            fetchRandomFact();
            setInterval(fetchRandomFact, 20000); // Changer à 20000 ms pour 20 secondes
        }
    }

    // JavaScript pour gérer l'ouverture de la modale (uniquement pour la page projets)
    if (currentPage === 'projects') {
        // Sélectionnez tous les boutons d'ouverture de la modale
        const openModalButtons = document.querySelectorAll('.open-modal-btn');
        const modal = document.getElementById('projectModal');
        const closeModalButton = document.querySelector('.close');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const modalGithub = document.getElementById('modal-github');
        const modalDeployment = document.getElementById('modal-deployment');
        const modalScreenshot = document.getElementById('modal-screenshot');

        if (openModalButtons.length > 0 && modal && closeModalButton && modalTitle && modalDescription && modalGithub && modalDeployment && modalScreenshot) {
            // Ajoutez un écouteur d'événements pour ouvrir la modale
            openModalButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const projectCard = button.parentElement;
                    const title = projectCard.getAttribute('data-title');
                    const description = projectCard.getAttribute('data-description');
                    const githubUrl = projectCard.getAttribute('data-github');
                    const deploymentUrl = projectCard.getAttribute('data-deployment');
                    const screenshot = projectCard.getAttribute('data-screenshot');

                    modalTitle.textContent = title;
                    modalDescription.textContent = description;
                    modalGithub.href = githubUrl;
                    modalDeployment.href = deploymentUrl;

                    if (screenshot) {
                        modalScreenshot.src = 'data:image/png;base64,' + screenshot;
                        modalScreenshot.style.display = 'block';
                    } else {
                        modalScreenshot.style.display = 'none';
                    }

                    modal.style.display = 'block';
                });
            });

            // Ajoutez un écouteur d'événements pour fermer la modale
            closeModalButton.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            // Ajoutez un écouteur d'événements pour fermer la modale en cliquant en dehors de celle-ci
            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        }
    }
});
