<script>
document.addEventListener('DOMContentLoaded', () => {
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        if (e.target.classList.contains('cn-stagger-item')) {
          e.target.classList.add('cn-visible');
        }
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });
  document.querySelectorAll('.sp-rev, .inicio-rev, .rev, .cn-stagger-item').forEach(el => obs.observe(el));
});
</script>
