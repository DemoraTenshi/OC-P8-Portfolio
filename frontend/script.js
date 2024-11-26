document.addEventListener("DOMContentLoaded", function() {
    const currentPage = new URLSearchParams(window.location.search).get('page') || 'home';
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    $navbarBurgers.forEach(el => {
        el.addEventListener('click', () => {
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');
        });
    });

    const toggleSwitch = document.getElementById('darkModeToggle');
    const illustrationWrapper = document.getElementById('illustration-wrapper');
    const logo = document.getElementById('logo');
    const flameGif = document.querySelector('.flame-gif'); // Sélectionnez le GIF de flamme

    if (toggleSwitch) {
        let lightPicture, darkPicture, doorDay, doorNight, chairDay, chairNight, tvDay, tvNight, libraryDay, libraryNight;

        if (illustrationWrapper) {
            lightPicture = illustrationWrapper.querySelector('.light-mode-picture');
            darkPicture = illustrationWrapper.querySelector('.dark-mode-picture');
            doorDay = illustrationWrapper.querySelector('.door-day');
            doorNight = illustrationWrapper.querySelector('.door-night');
            chairDay = illustrationWrapper.querySelector('.chair-day');
            chairNight = illustrationWrapper.querySelector('.chair-night');
            tvDay = illustrationWrapper.querySelector('.tv-day');
            tvNight = illustrationWrapper.querySelector('.tv-night');
            libraryDay = illustrationWrapper.querySelector('.library-day');
            libraryNight = illustrationWrapper.querySelector('.library-night');
        }

        const applyDarkMode = () => {
            document.body.classList.add('dark-mode');
            toggleSwitch.checked = true;

            if (lightPicture && darkPicture) {
                lightPicture.style.display = 'none';
                darkPicture.style.display = 'block';
            }

            if (doorDay && doorNight) {
                doorDay.classList.remove('active');
                doorNight.classList.add('active'); // Active la porte de nuit
            }

            if (logo) {
                logo.src = logo.getAttribute('data-dark-logo');
            }

            if (chairDay && chairNight) {
                chairDay.classList.remove('active');
                chairNight.classList.add('active'); // Active la chaise de nuit
            }
            if (tvDay && tvNight) {
                tvDay.classList.remove('active');
                tvNight.classList.add('active'); // Active la télé de nuit
            }
            if (libraryDay && libraryNight) {
                libraryDay.classList.remove('active');
                libraryNight.classList.add('active'); // Active la bibliothèque de nuit
            }

            if (flameGif) {
                flameGif.style.display = 'block'; // Affiche le GIF de flamme
            }
        };

        const applyLightMode = () => {
            document.body.classList.remove('dark-mode');
            toggleSwitch.checked = false;

            if (lightPicture && darkPicture) {
                lightPicture.style.display = 'block';
                darkPicture.style.display = 'none';
            }

            if (doorDay && doorNight) {
                doorDay.classList.add('active');
                doorNight.classList.remove('active'); // Active la porte de jour
            }

            if (logo) {
                logo.src = logo.getAttribute('data-light-logo');
            }

            if (chairDay && chairNight) {
                chairDay.classList.add('active');
                chairNight.classList.remove('active'); // Active la chaise de jour
            }

            if (tvDay && tvNight) {
                tvDay.classList.add('active');
                tvNight.classList.remove('active'); // Active la télé de jour
            }

            if (libraryDay && libraryNight) {
                libraryDay.classList.add('active');
                libraryNight.classList.remove('active'); // Active la bibliothèque de jour
            }

            if (flameGif) {
                flameGif.style.display = 'none'; // Cache le GIF de flamme
            }
        };

        if (localStorage.getItem('darkMode') === 'enabled') {
            applyDarkMode();
        } else {
            applyLightMode();
        }

        toggleSwitch.addEventListener('change', () => {
            if (toggleSwitch.checked) {
                localStorage.setItem('darkMode', 'enabled');
                applyDarkMode();
            } else {
                localStorage.setItem('darkMode', 'disabled');
                applyLightMode();
            }
        });
    }

    // Random facts code (home page)
    if (currentPage === 'home') {
        const randomFactsDiv = document.querySelector('.random-facts');
        if (randomFactsDiv) {
            async function fetchRandomFact() {
                try {
                    const response = await fetch('index.php?page=getRandomFact');
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

            // Appeler la fonction pour récupérer un fait aléatoire au chargement de la page
            fetchRandomFact();

            // Mettre à jour les faits aléatoires toutes les 10 secondes
            setInterval(fetchRandomFact, 10000);
        }
    }

    // Handle modal (projects page)
    if (currentPage === 'projects') {
        // Log pour vérifier si nous sommes sur la bonne page
        console.log('On projects page');

        const modal = document.querySelector('.modal');
        const modalBackground = document.querySelector('.modal-background');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const modalGithub = document.getElementById('modal-github');
        const modalDeployment = document.getElementById('modal-deployment');
        const modalScreenshot = document.getElementById('modal-screenshot');
        const closeModalButtons = document.querySelectorAll('.delete, .modal-close');

        // Sélectionner les project cards au lieu des titres
        const projectCards = document.querySelectorAll('.project-card');

        // Log pour vérifier si nous trouvons les cartes
        console.log('Found project cards:', projectCards.length);

        projectCards.forEach(card => {
            // Ajouter l'événement click sur toute la carte
            card.addEventListener('click', function() {
                console.log('Card clicked'); // Log pour vérifier le clic

                modalTitle.textContent = this.getAttribute('data-title');
                modalDescription.textContent = this.getAttribute('data-description');
                modalGithub.href = this.getAttribute('data-github');
                modalDeployment.href = this.getAttribute('data-deployment');

                const screenshotSrc = this.getAttribute('data-screenshot');
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
        let barChart;

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
                    const createBarChart = () => {
                        const isMobileOrTablet = window.innerWidth <= 943;

                        if (barChart) {
                            barChart.destroy(); // Détruire le graphique existant
                        }

                        barChart = new Chart(document.getElementById("barChart"), {
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
                                        display: isMobileOrTablet,  // Affiche les labels sur l'axe X en version mobile/tablette
                                        title: {
                                            display: isMobileOrTablet,
                                            text: 'Categories'
                                        }
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
                                        display: !isMobileOrTablet,  // Cache les datalabels en version mobile/tablette
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
                    };

                    createBarChart();

                    window.addEventListener('resize', () => {
                        createBarChart();  // Recrée le graphique avec les nouvelles options
                    });
                } catch (error) {
                    console.error("Erreur lors de la récupération des données:", error);
                }
            })
            .catch(error => console.error("Erreur lors de la récupération des données:", error));

        // Ajouter des gestionnaires d'événements pour les zones cliquables
        const chairClickableArea = document.querySelector('.chair-clickable-area');
        const tvClickableArea = document.querySelector('.tv-clickable-area');
        const recipeSection = document.getElementById('recipe');
        const recipeText = document.querySelector('.recipe-text');
        const barChartSection = document.getElementById('bar-chart');
        const skillsText = document.querySelector('.skills-text');

        if (chairClickableArea) {
            chairClickableArea.addEventListener('click', function(event) {
                event.preventDefault();
                recipeSection.style.display = 'flex';
                barChartSection.style.display = 'none';
                recipeText.style.display = 'none';
                skillsText.style.display = 'block';
                recipeSection.scrollIntoView({ behavior: 'smooth' });
            });
        }

        if (tvClickableArea) {
            tvClickableArea.addEventListener('click', function(event) {
                event.preventDefault();
                barChartSection.style.display = 'block';
                recipeSection.style.display = 'none';
                recipeText.style.display = 'block';
                skillsText.style.display = 'none';
                barChartSection.scrollIntoView({ behavior: 'smooth' });
            });
        }

        // Ajouter un gestionnaire d'événements pour masquer les sections lorsque l'utilisateur clique en dehors de l'illustration
        document.addEventListener('click', function(event) {
            const isClickInsideIllustration = illustrationWrapper.contains(event.target);
            if (!isClickInsideIllustration) {
                recipeSection.style.display = 'none';
                barChartSection.style.display = 'none';
                recipeText.style.display = 'block';
                skillsText.style.display = 'block';
            }
        });
    }

    // Contact form validation
    if (currentPage === 'contact') {
        // Fonction pour définir l'état d'un champ (valide, invalide, ou avertissement)
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
            } else if (inputClass === 'is-danger' || inputClass === 'is-warning') {
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
            if (!formIsValid()) {
                event.preventDefault(); // Empêcher la soumission si le formulaire n'est pas valide
                alert('Please fill in all required fields correctly.');

                // Mettre les champs invalides en état is-warning
                ['name', 'email', 'message'].forEach(field => {
                    const fieldValue = document.getElementById(field).value.trim();
                    if (fieldValue === '') {
                        setFieldState(field, 'is-warning', 'is-warning', 'This field is required');
                    }
                });
            }
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
            });
        });

        // Ajout de l'écouteur pour la soumission du formulaire
        if (submitButton) {
            submitButton.addEventListener('click', submitForm); // Soumettre normalement lorsque le bouton est cliqué
        }
    }
});
