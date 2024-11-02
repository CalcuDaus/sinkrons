const labelsPBG = Object.keys(pbgData);
const valuesPBG = Object.values(pbgData);

const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: labelsPBG,
    datasets: [
      {
        label: "Data PBG",
        data: valuesPBG,
        fill: false,
        borderColor: "#0049e8",
        backgroundColor: "#0049e8",
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
    },
  },
});
