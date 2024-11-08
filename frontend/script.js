document.addEventListener("DOMContentLoaded", function() {
    const currentPage = new URLSearchParams(window.location.search).get('page') || 'home';

   /* // Active nav-link
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
*/
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

// Fonction pour récupérer les données depuis data.php
fetch('backend/data.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);  // Vérification des données

        // Création du graphique en camembert
        new Chart(document.getElementById("pieChart"), {
            type: 'doughnut',
            data: {
                labels: data.pieLabels,
                datasets: [{
                    data: data.pieData,
                    backgroundColor: ["#D46B8C", "#8BD2BF", "#EC8E63", "#9BD0F5"]
                }]
            }
        });

        // Création du graphique en barres
        new Chart(document.getElementById("barChart"), {
            type: 'bar',
            data: {
                labels: data.barLabels,  // Utilise les étiquettes depuis les données
                datasets: [{
                    label: 'Skills',
                    data: data.barData,
                    backgroundColor: ["#D46B8C", "#8BD2BF", "#EC8E63", "#9BD0F5"]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true  // Affiche les étiquettes de l'axe X
                    },
                    y: {
                        type: 'linear',  // Utilise un axe linéaire pour les valeurs numériques
                        beginAtZero: true,  // Commence à zéro
                        ticks: {
                            callback: function(value) {
                                if (value === 25) return 'Newbie';
                                if (value === 50) return 'Geek';
                                if (value === 75) return 'Passionate';
                                if (value === 100) return 'God Mode';
                                return '';
                            },
                            stepSize: 25,  // Définit la taille des graduations
                            max: 100  // Définit la valeur maximale de l'axe Y
                        },
                        title: {
                            display: true,
                            text: 'Level'
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'center',
                        align: 'center',
                        color: '#ffffff',
                        formatter: function(value, context) {
                            const label = data.barLabels[context.dataIndex];

                            // Retourne le label en deux lignes avec un retour à la ligne
                            return label.includes('/')
                                ? label.split('/').join('\n')  // Remplace '/' par '\n' pour un retour à la ligne
                                : label;
                        },
                        font: {
                            weight: 'bold',
                            size: 12
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    })
    .catch(error => console.error("Erreur lors de la récupération des données:", error));


     // Définir les données du formulaire et les erreurs
    const formData = {
        name: '',
        email: '',
        message: ''
    };
    const errors = {
        name: '',
        email: '',
        message: ''
    };

    // Sélecteurs des champs de formulaire
    const nameField = document.getElementById('name');
    const emailField = document.getElementById('email');
    const messageField = document.getElementById('message');
    const submitButton = document.querySelector('button[type="submit"]');
    const errorMessages = {
        name: document.getElementById('name-error'),
        email: document.getElementById('email-error'),
        message: document.getElementById('message-error')
    };

    // Fonction pour valider chaque champ
    function validateField(field) {
        if (field === 'name') {
            errors.name = formData.name.length > 0 ? '' : 'Name is required';
        } else if (field === 'email') {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            errors.email = emailPattern.test(formData.email) ? '' : 'Valid email is required';
        } else if (field === 'message') {
            errors.message = formData.message.length > 0 ? '' : 'Message is required';
        }
        updateErrorMessages();
    }

    // Fonction pour afficher les messages d'erreur
    function updateErrorMessages() {
        errorMessages.name.textContent = errors.name;
        errorMessages.email.textContent = errors.email;
        errorMessages.message.textContent = errors.message;
    }

    // Fonction pour vérifier si le formulaire est valide
    function formIsValid() {
        return formData.name.length > 0 && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email) && formData.message.length > 0;
    }

    // Fonction de soumission du formulaire
    function submitForm(event) {
        event.preventDefault(); // Empêche la soumission du formulaire par défaut

        if (formIsValid()) {
            alert('Form submitted successfully!');
            // Ici, tu peux envoyer les données par AJAX si nécessaire
        } else {
            alert('Please fill out all required fields.');
        }
    }

    // Écouteurs d'événements pour mettre à jour les données du formulaire et valider
    [nameField, emailField, messageField].forEach(field => {
        field.addEventListener('input', function () {
            formData[field.id] = field.value;
            validateField(field.id);
        });
    });

    // Écouteur pour le bouton de soumission
    if (submitButton) {
        submitButton.addEventListener('click', submitForm);
    }


});

