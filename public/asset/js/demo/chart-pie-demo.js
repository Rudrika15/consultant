// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["New", "Disqualified", "Qualified", "Contacted", "Proposal sent", "Converted"],
    datasets: [{
      data: [20, 15, 15, 20, 10, 10],
      backgroundColor: ['gray', '#D9D9D9', 'black', 'rgba(14, 14, 14, 0.58)', '#F5F5F5', 'rgba(118, 118, 118, 0.553691'],
      hoverBackgroundColor: ['gray', '#D9D9D9', 'black', 'rgba(14, 14, 14, 0.58)', '#F5F5F5', 'rgba(118, 118, 118, 0.553691'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

