function fetchCompletedQuests() {
    fetch('/completedQuests')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
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
function fetchUserLevel(){
    fetch('/level')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const userLevel = document.querySelector('.level-circle');
            if(userLevel){
                console.log(data);
                userLevel.textContent = `${data.currentLevel.level}`;
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}
function fetchUserPoints() {
    fetch('/points')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const userPoints = document.querySelector('.profile-container');
            if (userPoints) {
                console.log(data);
                const pointsElement = document.createElement("div");
                pointsElement.classList.add("user-points");
                pointsElement.textContent = `${data.currentPoints.points}` + " / 100";
                userPoints.appendChild(pointsElement);
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}
document.addEventListener("DOMContentLoaded", function() {
    const levelContainer = document.querySelector(".level-bar");

    function updateLevelBar(points) {
        const maxWidth = 100;
        const percentage = (points / 100) * maxWidth;

        let levelBar = document.querySelector(".bar");

        if (!levelBar) {
            // Jeśli pasek poziomu jeszcze nie istnieje, stwórz go
            levelBar = document.createElement("div");
            levelBar.classList.add("bar");
            levelContainer.appendChild(levelBar);
        }
        levelBar.style.width = percentage + "%";
    }

    function fetchPoints() {
        fetch("/points")
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                updateLevelBar(data.currentPoints.points);
            })
            .catch(error => {
                console.error("There was a problem with the fetch operation:", error);
            });
    }

    fetchPoints(); // Pobierz punkty po załadowaniu strony
});



document.addEventListener('DOMContentLoaded', fetchCompletedQuests);
document.addEventListener('DOMContentLoaded', fetchUserNickname);
document.addEventListener('DOMContentLoaded', fetchUserLevel);
document.addEventListener('DOMContentLoaded', fetchUserPoints);

