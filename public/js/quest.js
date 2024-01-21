// // quest.js
//
// // Pobierz przyciski "Finnish task"
// const finishButtons = document.querySelectorAll('.finish-task button');
//
// // Dodaj event listener do każdego przycisku
// finishButtons.forEach(button => {
//     button.addEventListener('click', () => {
//         const questId = button.getAttribute('data-quest-id');
//         finishQuest(questId);
//     });
// });
//
// // Funkcja do wysyłania zapytania do serwera PHP
// function finishQuest(questId) {
//     const url = `/finishQuest`;
//
//     fetch(url, {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({ questId: questId }),
//     })
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Network response was not ok');
//             }
//             return response.json();
//         })
//         .then(data => {
//             // Tutaj możesz obsługiwać odpowiedź z serwera, np. aktualizować widok, komunikaty, itp.
//             console.log('Quest finished:', data);
//
//             // Usuń zadanie z widoku
//             removeQuestFromView(questId);
//         })
//         .catch(error => {
//             console.error('There was a problem with the fetch operation:', error);
//         });
// }
//
// // Funkcja do usuwania questa z widoku
// function removeQuestFromView(questId) {
//     const questElement = document.querySelector(`[data-quest-id="${questId}"]`);
//     if (questElement) {
//         questElement.parentElement.remove();
//     }
// }