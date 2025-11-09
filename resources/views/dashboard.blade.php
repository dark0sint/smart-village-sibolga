<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Villages Sibolga</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>
    <div id="app">
        <h1>Welcome to Smart Villages Sibolga</h1>
        <nav>
            <a href="#health">Health</a>
            <a href="#education">Education</a>
            <a href="#infrastructure">Infrastructure</a>
        </nav>
        <div id="health" v-if="activeTab === 'health'">
            <h2>Health Services</h2>
            <button @click="bookAppointment">Book Appointment</button>
            <ul>
                <li v-for="appt in appointments" :key="appt.id">{{ appt.date }} - {{ appt.doctor }}</li>
            </ul>
        </div>
        <!-- Similar sections for other services -->
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                activeTab: 'health',
                appointments: []
            },
            methods: {
                bookAppointment() {
                    // AJAX call to Laravel API
                    fetch('/api/health/book-appointment', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ date: '2023-10-01', doctor: 'Dr. Smith' })
                    }).then(res => res.json()).then(data => this.appointments.push(data));
                }
            },
            mounted() {
                // Load data on mount
                fetch('/api/health/appointments').then(res => res.json()).then(data => this.appointments = data);
            }
        });
    </script>
</body>
</html>
