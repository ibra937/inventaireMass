// Fonction pour attacher les événements aux inputs d'un élément (qu'il soit initial ou cloné)
function bindInputEvents(element) {
    element.querySelectorAll('input, select, textarea').forEach(input => {
        input.addEventListener('input', function() {
            localStorage.setItem(input.id, input.value);
        });
    });
}

// Fonction de clonage d'un bloc de champs
function cloneElement(id, block, updateCounter = true) {
    const baseDiv = document.getElementById(id);
    const newDiv = baseDiv.cloneNode(true);
    const globalContainer = document.getElementById(block);
    const nbrInput = globalContainer.querySelectorAll('input').length;
    const newIndex = Math.floor(nbrInput / 2) + 1;

    newDiv.querySelectorAll('input').forEach(input => {
        const currentName = input.getAttribute('name');
        const newName = currentName.replace(/\d+$/, newIndex);
        input.setAttribute('name', newName);
        input.setAttribute('id', newName);
        // On vide le champ dans le clone
        input.value = "";
    });

    baseDiv.parentNode.appendChild(newDiv);
    bindInputEvents(newDiv);

    // Met à jour le compteur dans le localStorage seulement si updateCounter vaut true
    if (updateCounter) {
        const countKey = block + 'Count';
        let count = parseInt(localStorage.getItem(countKey)) || 1;
        count = Math.max(count, newIndex);
        localStorage.setItem(countKey, count);
    }
}


// Fonction pour recréer les clones lors du chargement de la page
function rehydrateClones(group, baseDivId) {
    // Récupère le compteur sauvegardé (par exemple "risingCount")
    const countKey = group + 'Count';
    let count = parseInt(localStorage.getItem(countKey)) || 1;

    // Le bloc de base est déjà présent : on doit cloner (count - 1) fois
    for (let i = 2; i <= count; i++) {
        cloneElement(baseDivId, group);
    }
}

// Attache les écouteurs aux boutons "plus" pour ajouter de nouveaux blocs
document.getElementById('moreRising').addEventListener('click', () => {
    cloneElement('blockRising', 'rising');
});
document.getElementById('moreTransport').addEventListener('click', () => {
    cloneElement('blockTransport', 'transport');
});
document.getElementById('moreRepast').addEventListener('click', () => {
    cloneElement('blockRepast', 'repast');
});
document.getElementById('morePayment').addEventListener('click', () => {
    cloneElement('blockPayment', 'payment');
});
document.getElementById('moreSales').addEventListener('click', () => {
    cloneElement('blockSales', 'sales');
});
document.getElementById('moreOther').addEventListener('click', () => {
    cloneElement('blockOther', 'other');
});

document.addEventListener("DOMContentLoaded", function() {
    // Recrée les clones pour chaque groupe si le compteur est supérieur à 1
    rehydrateClones('rising', 'blockRising');
    rehydrateClones('transport', 'blockTransport');
    rehydrateClones('repast', 'blockRepast');
    rehydrateClones('payment', 'blockPayment');
    rehydrateClones('sales', 'blockSales');
    rehydrateClones('other', 'blockOther');

    // Attache un écouteur par délégation sur le formulaire pour sauvegarder toute modification
    const form = document.querySelector('form');
    form.addEventListener('input', function(e) {
        const target = e.target;
        if (['input', 'select', 'textarea'].includes(target.tagName.toLowerCase())) {
            localStorage.setItem(target.id, target.value);
        }
    });

    // Restaure les valeurs sauvegardées pour tous les champs présents dans le DOM
    const inputs = document.querySelectorAll('form input, form select, form textarea');
    inputs.forEach(input => {
        const savedValue = localStorage.getItem(input.id);
        if (savedValue !== null) {
            input.value = savedValue;
        }
    });

    // Confirmation avant soumission du formulaire
    document.getElementById('confirmSubmit').addEventListener('click', function() {
        const date = document.getElementById('date')
        const place = document.getElementById('place')
        // Vérification du champ "place"
        if (!date.value) {
            alert('Le champ "Date" est requis.');
            return; // Empêche la soumission du formulaire
        }

        // Vérification du champ "place"
        if (!place.value || place.selectedIndex === 0) {
            alert('Veuillez sélectionner un entrepôt.');
            return; // Empêche la soumission du formulaire
        }
        // Soumettre le formulaire après la confirmation
        document.getElementById('myForm').submit()
    })

    // Si la page a été rechargée avec ?success=true, affiche le message de succès
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === 'true') {
        const successMessage = document.getElementById('successMessage');
        successMessage.style.display = "block";
        successMessage.classList.add('fade-in');
        setTimeout(function() {
            successMessage.classList.remove('fade-in');
            successMessage.classList.add('fade-out');
        }, 3000);
        setTimeout(function() {
            successMessage.style.display = "none";
        }, 4000);
    }

    // Lors de la soumission du formulaire, on peut (optionnellement) effacer le localStorage
    form.addEventListener('submit', function() {
        inputs.forEach(input => {
            localStorage.removeItem(input.id);
        });
        // Réinitialiser les compteurs pour chaque groupe
        ['rising', 'transport', 'repast', 'payment', 'sales', 'other'].forEach(group => {
            localStorage.removeItem(group + 'Count');
        });
    });
});
