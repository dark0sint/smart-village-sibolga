from flask import Flask, jsonify
import requests  # For external API calls, e.g., OpenWeatherMap

app = Flask(__name__)

@app.route('/forecast/<location>')
def get_forecast(location):
    # Simulate API call to weather service
    response = requests.get(f'https://api.openweathermap.org/data/2.5/weather?q={location}&appid=YOUR_API_KEY')
    data = response.json()
    # Process data for crop advisory
    advisory = "Plant rice if temperature > 25°C" if data['main']['temp'] > 298 else "Wait for warmer weather"
    return jsonify({'forecast': data, 'advisory': advisory})

if __name__ == '__main__':
    app.run(debug=True)
