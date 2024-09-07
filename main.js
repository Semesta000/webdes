
// LOGOUT MODAL
const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }

        var modal = document.getElementById('myModal');
        var btn = document.getElementById('logoutBtn');
        var modalButtonDiv = document.querySelector('.modalButton');
        btn.onclick = function() {
            modal.style.display = 'block';
        };
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
        };
        modalButtonDiv.addEventListener('click', function(event) {
            if (event.target.id === 'cancelLogout') {
                modal.style.display = 'none';
            } else if (event.target.id === 'confirmLogout') {
                window.location.href = 'logout.php';
            }
        });

function checkSchedule() {
    const today = new Date();
    const dayOfWeek = today.getDay();
    const currentHour = today.getHours();
    const currentMinutes = today.getMinutes();

    let isOpen = false;
    let message = "";

    if (dayOfWeek >= 1 && dayOfWeek <= 5) {
        if (
        (currentHour > 7 || (currentHour === 7 && currentMinutes >= 30)) &&
        currentHour < 14
        ) {
        isOpen = true;
        }
    } else if (dayOfWeek === 6) {
        // Sabtu
        if (currentHour === 7 && currentMinutes >= 0 && currentHour < 12) {
        isOpen = true;
        }
    }

    if (isOpen) {
        message = "Buka";
    } else {
        message = "Tutup";
    }

    document.getElementById("jadwal").innerText = `Hari ini: ${getDayName(
        dayOfWeek
    )} - ${message}`;
    }

function getDayName(day) {
    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    return days[day];
    }

checkSchedule();
// SIDE NAVIGATION





