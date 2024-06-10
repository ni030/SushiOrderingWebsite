document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.section');

    function showSection(sectionId) {
        sections.forEach(section => {
            section.style.display = 'none';
        });
        const selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }
    }

    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const sectionId = this.getAttribute('href').substring(1);
            showSection(sectionId);
        });
    });

    // Show the default section when the page loads
    showSection('userProfile');
});
