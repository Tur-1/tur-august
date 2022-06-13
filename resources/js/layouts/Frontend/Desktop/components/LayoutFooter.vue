<template>
    <footer class="footer desktop-footer">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="navbar-brand">AUGUST</h1>
                <div>Copyright &copy;{{ currentYear }} AUGUST</div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            currentYear: new Date().getFullYear(),
        };
    },
};
</script>
