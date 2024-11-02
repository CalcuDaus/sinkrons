const runChartPBG = () => {
  delete pbgData[Object.keys(pbgData)[0]];
  const labelsPBG = Object.keys(pbgData);
  const valuesPBG = Object.values(pbgData);

  const ctx = document.getElementById("chartPBG").getContext("2d");
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
};

const runChartKRK = () => {
  delete krkData[Object.keys(krkData)[0]];
  const labelsKRK = Object.keys(krkData);
  const valuesKRK = Object.values(krkData);

  const ctx = document.getElementById("chartKRK").getContext("2d");
  const myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labelsKRK,
      datasets: [
        {
          label: "Data KRK",
          data: valuesKRK,
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
};
const runChartSupervision = () => {
  delete supervisionData[Object.keys(supervisionData)[0]];
  const labelsSupervision = Object.keys(supervisionData);
  const valuesSupervision = Object.values(supervisionData);

  const ctx = document.getElementById("chartPengawasan").getContext("2d");
  const myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labelsSupervision,
      datasets: [
        {
          label: "Data Pengawasan",
          data: valuesSupervision,
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
};
const runChartUser = () => {
  delete userData[Object.keys(userData)[0]];
  const labelsUser = Object.keys(userData);
  const valuesUser = Object.values(userData);

  const ctx = document.getElementById("chartPengguna").getContext("2d");
  const myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labelsUser,
      datasets: [
        {
          label: "Data Pengguna",
          data: valuesUser,
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
};

runChartUser();
runChartSupervision();
runChartKRK();
runChartPBG();
