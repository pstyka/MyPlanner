document.addEventListener('DOMContentLoaded', function () {
    var questInfo = document.getElementById('quest-info');
    questInfo.addEventListener('mouseenter', function () {
        var questDescription = document.getElementById('quest-description');
        questDescription.style.display = 'block';
    });

    questInfo.addEventListener('mouseleave', function () {
        var questDescription = document.getElementById('quest-description');
        questDescription.style.display = 'none';
    });
});