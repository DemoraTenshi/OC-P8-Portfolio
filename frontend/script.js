document.addEventListener("DOMContentLoaded", function() {
    const currentPage = new URLSearchParams(window.location.search).get('page') || 'home';

    // dark/light mode toggle
    const toggleSwitch = document.getElementById('darkModeToggle');
    const illustration = document.getElementById('illustration');

    if (toggleSwitch && illustration) {
        const lightImage = illustration.getAttribute('data-light');
        const darkImage = illustration.getAttribute('data-dark');

        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            illustration.src = darkImage;
            toggleSwitch.checked = true;
        }

        toggleSwitch.addEventListener('change', () => {
            document.body.classList.toggle('dark-mode');

            if (document.body.classList.contains('dark-mode')) {
                illustration.src = darkImage;
                localStorage.setItem('darkMode', 'enabled');
            } else {
                illustration.src = lightImage;
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    }

    // Random facts code (home page)
    if (currentPage === 'home') {
        const randomFactsDiv = document.querySelector('.random-facts');
        if (randomFactsDiv) {
            async function fetchRandomFact() {
                try {
                    const response = await fetch('backend/random_fact.php');
                    const fact = await response.json();

                    document.querySelector('.fact-title').textContent = fact.title;
                    document.querySelector('.fact-content').textContent = fact.content;
                    document.querySelector('.fact-emoji').textContent = fact.emoji;

                    const factContentElement = document.querySelector('.fact-content');
                    factContentElement.classList.add('active');
                } catch (error) {
                    console.error("Erreur lors de la récupération du fait :", error);
                }
            }

            fetchRandomFact();
            setInterval(fetchRandomFact, 20000);
        }
    }

    // Handle modal (projects page)
    if (currentPage === 'projects') {
        const openModalButtons = document.querySelectorAll('.open-modal-btn');
        const modal = document.querySelector('.modal');
        const modalBackground = document.querySelector('.modal-background');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const modalGithub = document.getElementById('modal-github');
        const modalDeployment = document.getElementById('modal-deployment');
        const modalScreenshot = document.getElementById('modal-screenshot');
        const closeModalButtons = document.querySelectorAll('.delete, .modal-close');

        openModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                const projectCard = this.parentElement;
                modalTitle.textContent = projectCard.getAttribute('data-title');
                modalDescription.textContent = projectCard.getAttribute('data-description');
                modalGithub.href = projectCard.getAttribute('data-github');
                modalDeployment.href = projectCard.getAttribute('data-deployment');
                const screenshotSrc = projectCard.getAttribute('data-screenshot');
                if (screenshotSrc) {
                    modalScreenshot.src = screenshotSrc;
                    modalScreenshot.style.display = 'block';
                } else {
                    modalScreenshot.style.display = 'none';
                }
                modal.classList.add('is-active');
            });
        });

        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                modal.classList.remove('is-active');
            });
        });

        modalBackground.addEventListener('click', function() {
            modal.classList.remove('is-active');
        });
    }

    
   // Fonction pour récupérer les données depuis DataController via une API
    if (currentPage === 'about') {
        fetch('index.php?page=getData')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text(); // Récupérer la réponse en texte pour vérification
            })
            .then(text => {
                console.log('Response text:', text); // Afficher la réponse en texte pour vérification
                try {
                    const data = JSON.parse(text); // Parser la réponse en JSON
                    console.log(data); // Vérification des données récupérées

                    // Créer le graphique en camembert
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

                    // Créer le graphique en barres
                    new Chart(document.getElementById("barChart"), {
                        type: 'bar',
                        data: {
                            labels: data.barLabels,
                            datasets: [{
                                label: '',
                                data: data.barData,
                                backgroundColor: ["#D46B8C", "#8BD2BF", "#EC8E63", "#9BD0F5"]
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                x: {
                                    display: false  // Cache les labels sur l'axe X
                                },
                                y: {
                                    type: 'linear',
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            if (value === 25) return 'Newbie';
                                            if (value === 50) return 'Geek';
                                            if (value === 75) return 'Expert';
                                            if (value === 100) return 'God Mode';
                                            return '';
                                        },
                                        stepSize: 25,
                                        max: 100
                                    },
                                    title: {
                                        display: true,
                                        text: 'Level'
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                datalabels: {
                                    anchor: 'center',
                                    align: 'center',
                                    color: '#ffffff',
                                    formatter: function(value, context) {
                                        const label = data.barLabels[context.dataIndex];
                                        return label.includes('/')
                                            ? label.split('/').join('\n')  // Ajoute un retour à la ligne
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
                } catch (error) {
                    console.error("Erreur lors de la récupération des données:", error);
                }
            })
            .catch(error => console.error("Erreur lors de la récupération des données:", error));
    }

    // Contact form validation
    // Fonction pour définir l'état d'un champ (valide, invalide, ou avertissement)
    if (currentPage === 'contact') {
        function setFieldState(field, inputClass, iconClass, errorMsg) {
            const inputElement = document.getElementById(field);
            let iconRight = inputElement.parentElement.querySelector('.icon.is-right');
            const errorElement = document.querySelector(`#${field} + .error p`);

            // Réinitialiser les classes
            inputElement.classList.remove('is-success', 'is-warning', 'is-danger');

            // Ajouter les nouvelles classes de validation
            inputElement.classList.add(inputClass);

            // Si l'élément d'icône n'existe pas, le créer
            if (!iconRight) {
                iconRight = document.createElement('i');
                iconRight.classList.add('icon', 'is-right');  // Ajout des classes pour l'icône
                inputElement.parentElement.appendChild(iconRight);
            }

            // Gérer l'affichage des icônes : ajouter ou retirer les classes appropriées
            if (inputClass === 'is-success') {
                iconRight.classList.remove('fa-exclamation-triangle'); // Retirer l'icône d'erreur
                iconRight.classList.add('fa', 'fa-check');  // Ajouter l'icône de succès
            } else if (inputClass === 'is-danger') {
                iconRight.classList.remove('fa-check'); // Retirer l'icône de succès
                iconRight.classList.add('fa', 'fa-exclamation-triangle');  // Ajouter l'icône d'erreur
            }

            // Afficher ou masquer le message d'erreur
            if (errorMsg) {
                errorElement.textContent = errorMsg;
                errorElement.style.display = 'block';
            } else {
                errorElement.textContent = '';
                errorElement.style.display = 'none';
            }
        }

        // Fonction de validation des champs
        function validateField(field) {
            const fieldValue = document.getElementById(field).value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Validation spécifique à chaque champ
            if (field === 'name') {
                if (fieldValue === '') {
                    setFieldState(field, 'is-danger', 'is-danger', 'This field is required');
                } else {
                    setFieldState(field, 'is-success', 'is-success', ''); // Classe is-success si valide
                }
            } else if (field === 'email') {
                if (fieldValue === '') {
                    setFieldState(field, 'is-danger', 'is-danger', 'This field is required');
                } else if (!emailPattern.test(fieldValue)) {
                    setFieldState(field, 'is-danger', 'is-danger', 'Invalid email address');
                } else {
                    setFieldState(field, 'is-success', 'is-success', ''); // Classe is-success si valide
                }
            } else if (field === 'message') {
                if (fieldValue === '') {
                    setFieldState(field, 'is-danger', 'is-danger', 'This field is required');
                } else {
                    setFieldState(field, 'is-success', 'is-success', ''); // Classe is-success si valide
                }
            }
        }

        // Vérifie si tous les champs obligatoires sont remplis correctement
        function formIsValid() {
            const nameValid = document.getElementById('name').classList.contains('is-success');
            const emailValid = document.getElementById('email').classList.contains('is-success');
            const messageValid = document.getElementById('message').classList.contains('is-success');

            return nameValid && emailValid && messageValid;
        }

        // Fonction de gestion de la soumission du formulaire
        function submitForm(event) {
            // La soumission du formulaire se fait normalement
            // Il est automatiquement envoyé au serveur quand le bouton est cliqué
            // Pas de preventDefault() ici car le formulaire doit être soumis à votre controller PHP
            event.target.submit();  // Soumet le formulaire normalement
        }

        // Sélecteurs des champs de formulaire
        const nameField = document.getElementById('name');  // Champ name
        const emailField = document.getElementById('email');
        const messageField = document.getElementById('message');
        const submitButton = document.querySelector('button[type="submit"]');

        // Ajout des écouteurs d'événements pour valider les champs à chaque saisie
        [nameField, emailField, messageField].forEach(field => {
            field.addEventListener('input', function () {
                validateField(field.id);
                // Vérifie l'état du formulaire pour activer ou désactiver le bouton de soumission
                if (formIsValid()) {
                    submitButton.disabled = false;
                    submitButton.classList.add('is-primary'); // Ajouter la classe is-primary si valide
                } else {
                    submitButton.disabled = true;
                    submitButton.classList.remove('is-primary'); // Enlever la classe is-primary si invalide
                }
            });
        });

        // Initialisation de l'état du bouton au départ (dépend de la validité des champs)
        submitButton.disabled = true;

        // Ajout de l'écouteur pour la soumission du formulaire
        if (submitButton) {
            submitButton.addEventListener('click', submitForm); // Soumettre normalement lorsque le bouton est cliqué
        }
    }
});
