const hamburger = document.querySelector('.hamburger-menu');
const mobileNav = document.querySelector('.mobile-nav');

hamburger.addEventListener('click', () => {
  mobileNav.classList.toggle('open');
});

document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('search');
  const mobileSearchInput = document.getElementById('mobile-search');
  const courses = document.querySelectorAll('.course');

  function filterCourses() {
    const searchText = searchInput.value.toLowerCase();
    courses.forEach(course => {
      const title = course.querySelector('h3').textContent.toLowerCase();
      const description = course.querySelector('p').textContent.toLowerCase();
      if (title.includes(searchText) || description.includes(searchText)) {
        course.style.display = 'block';
      } else {
        course.style.display = 'none';
      }
    });
  }

  function filterMobileCourses() {
    const searchText = mobileSearchInput.value.toLowerCase();
    courses.forEach(course => {
      const title = course.querySelector('h3').textContent.toLowerCase();
      const description = course.querySelector('p').textContent.toLowerCase();
      if (title.includes(searchText) || description.includes(searchText)) {
        course.style.display = 'block';
      } else {
        course.style.display = 'none';
      }
    });
  }

  searchInput.addEventListener('input', filterCourses);
  mobileSearchInput.addEventListener('input', filterMobileCourses);
});
