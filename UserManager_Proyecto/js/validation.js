// js/validation.js - Validación simple para formularios

document.addEventListener('DOMContentLoaded', function() {
    
    // Función para validar email
    function validarEmail(email) {
        return email.includes('@') && email.includes('.');
    }
    
    // ========== VALIDACIÓN PARA LOGIN ==========
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            let hayError = false;
            let mensaje = '';
            
            const email = this.email.value.trim();
            const password = this.password.value;
            
            // Validar email
            if (email === '') {
                mensaje += 'El email es requerido\n';
                hayError = true;
            } else if (!validarEmail(email)) {
                mensaje += 'El email no es válido\n';
                hayError = true;
            }
            
            // Validar contraseña
            if (password === '') {
                mensaje += 'La contraseña es requerida\n';
                hayError = true;
            }
            
            // Si hay errores
            if (hayError) {
                event.preventDefault();
                alert('Errores:\n\n' + mensaje);
            }
        });
    }
    
    // ========== VALIDACIÓN PARA REGISTRO ==========
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            let hayError = false;
            let mensaje = '';
            
            const nombre = this.nombre.value.trim();
            const email = this.email.value.trim();
            const password = this.password.value;
            const confirmPassword = this.confirm_password.value;
            const edad = this.edad.value;
            
            // Validar nombre
            if (nombre === '') {
                mensaje += 'El nombre es requerido\n';
                hayError = true;
            } else if (nombre.length < 3) {
                mensaje += 'El nombre debe tener al menos 3 letras\n';
                hayError = true;
            }
            
            // Validar email
            if (email === '') {
                mensaje += 'El email es requerido\n';
                hayError = true;
            } else if (!validarEmail(email)) {
                mensaje += 'El email no es válido\n';
                hayError = true;
            }
            
            // Validar contraseña
            if (password === '') {
                mensaje += 'La contraseña es requerida\n';
                hayError = true;
            } else if (password.length < 6) {
                mensaje += 'La contraseña debe tener al menos 6 caracteres\n';
                hayError = true;
            }
            
            // Validar confirmación
            if (confirmPassword === '') {
                mensaje += 'Confirma tu contraseña\n';
                hayError = true;
            } else if (password !== confirmPassword) {
                mensaje += 'Las contraseñas no coinciden\n';
                hayError = true;
            }
            
            // Validar edad
            if (edad === '') {
                mensaje += 'La edad es requerida\n';
                hayError = true;
            } else {
                const edadNum = parseInt(edad);
                if (isNaN(edadNum) || edadNum < 1 || edadNum > 120) {
                    mensaje += 'La edad debe ser entre 1 y 120 años\n';
                    hayError = true;
                }
            }
            
            // Si hay errores
            if (hayError) {
                event.preventDefault();
                alert('Por favor corrige estos errores:\n\n' + mensaje);
            }
        });
    }
});