function fetchCompletedQuests() {
    fetch('/completedQuests')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Tutaj możesz obsługiwać dane, np. aktualizować widok na stronie
            const completedQuestsElement = document.querySelector('.completed-quests');
            if (completedQuestsElement) {
                completedQuestsElement.textContent = `Completed Quests:  ${data.completedQuests}`;
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function fetchUserNickname() {
    fetch('/nickname')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const userNicknameElement = document.querySelector('.user-nickname');
            if (userNicknameElement) {
                userNicknameElement.textContent = `${data.currentUserNickname}`;
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}


document.addEventListener('DOMContentLoaded', fetchCompletedQuests);
document.addEventListener('DOMContentLoaded', fetchUserNickname);