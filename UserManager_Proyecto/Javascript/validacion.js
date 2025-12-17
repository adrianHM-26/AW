document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (!form) return;

    form.addEventListener("submit", function (event) {
        const errores = [];

        const nombre = form.nombre ? form.nombre.value.trim() : "";
        const email  = form.email  ? form.email.value.trim()  : "";
        const edad   = form.edad   ? form.edad.value.trim()   : "";
        const rol    = form.rol    ? form.rol.value           : "";
        const password  = form.password  ? form.password.value  : "";
        const password2 = form.password2 ? form.password2.value : "";

        if (form.nombre && nombre.length < 3) {
            errores.push("Nombre demasiado corto");
        }

        if (form.email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) errores.push("Email inválido");
        }

        if (form.edad) {
            const n = parseInt(edad);
            if (isNaN(n) || n < 1 || n > 120) errores.push("Edad inválida");
        }

        if (form.password2 && password !== password2) {
            errores.push("Las contraseñas no coinciden");
        }

        if (errores.length > 0) {
            event.preventDefault();
            alert(errores.join("\n"));
        }
    });
});
