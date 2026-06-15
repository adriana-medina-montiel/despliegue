<script>
document.querySelectorAll('.rev, .deck-rev').forEach(el => {
  new IntersectionObserver(([e]) => { if (e.isIntersecting) e.target.classList.add('visible'); }, { threshold: 0.1 }).observe(el);
});
</script>
