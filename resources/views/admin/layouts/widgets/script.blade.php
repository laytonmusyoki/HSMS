<script>
    function showSidebar(sectionId) {
        const sections = document.querySelectorAll('.sidebar-section');
        sections.forEach(section => {
            section.style.display = 'none';
        });

        const sectionToShow = document.getElementById(sectionId);
        if (sectionToShow) {
            sectionToShow.style.display = 'block';
        }


        const hasArrow = sectionToShow.querySelector('.has-arrow');
        if (hasArrow) {
            const ul = sectionToShow.querySelector('ul');
            if (ul) {
                ul.style.display = 'block'; 
            }
        }

        localStorage.setItem('activeSidebarSection', sectionId);
    }

    function showChildSection(childId) {
        console.log('Clicked on child:', childId);
        const childSections = document.querySelectorAll('.child-section');
        childSections.forEach(child => {
            child.style.display = 'none';
        });

        const childToShow = document.getElementById(childId);
        if (childToShow) {
            childToShow.style.display = 'block';
        }

        const parentSection = childToShow.closest('.sidebar-section');
        if (parentSection) {
            parentSection.style.display = 'block';

            
            const hasArrow = parentSection.querySelector('.has-arrow');
            if (hasArrow) {
                const ul = parentSection.querySelector('ul');
                if (ul) {
                    ul.style.display = 'block'; 
                }
            }
        }

        localStorage.setItem('activeChildSection', childId);
    }

    window.onload = function() {
        const savedSectionId = localStorage.getItem('activeSidebarSection');
        const savedChildId = localStorage.getItem('activeChildSection');

        const sections = document.querySelectorAll('.sidebar-section');
        sections.forEach(section => {
            section.style.display = 'none';
        });

        if (savedSectionId) {
            showSidebar(savedSectionId);

            if (savedChildId) {
                showChildSection(savedChildId);
            }
        }
    };
</script>
