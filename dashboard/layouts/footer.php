</div>
    <script>
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', () => {
                const submenu = button.nextElementSibling;
                submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
            });
        });
    </script>

</body>

</html>