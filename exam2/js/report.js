const boot = () => {
    const fallbackChart = function() {};
    const Chart = window.Chart || (fallbackChart);
    const reportsContainer = document.getElementById('reports-container');
    const programDataHtml = document.getElementById('programData');
    let programData = [];
    try {
        programData = JSON.parse(programDataHtml.innerHTML)
    }catch (e) {

    }

    const getAllUnionModules = () => {
        const allModulesUnion = [];
        const moduleIds = new Set();
        programData.forEach(p => {
            p.modules?.forEach(m => {
                if (!moduleIds.has(m.id)) {
                    moduleIds.add(m.id);
                    allModulesUnion.push(m);
                }
            });
        });

        return allModulesUnion;
    }

    const getGroupedBarChartLabels = () => {
        return programData.map(p => p.name);
    }

    const getGroupedBarChartDatasets = (allModulesUnion) => {
        const programCreditsMap = programData.map(p => {
            const moduleMap = new Map();
            p.modules.forEach(m => moduleMap.set(m.id, m.credits));
            return moduleMap;
        });

        return allModulesUnion.map(module => {
            const data = programCreditsMap.map(moduleMap => moduleMap.get(module.id) || 0);
            return {
                label: module.name,
                data,
            };
        });
    }

    programData.forEach((program, index) => {
        const canvasId = `canvas-chart-${index + 1}`;
        reportsContainer.innerHTML += `<canvas id="${canvasId}"></canvas>`;
        const config = {
            type: 'pie',
            data: {
                labels: program.modules.map(m => m.name),
                datasets: [{
                    label: program.name,
                    data: program.modules.map(m => m.credits),
                    hoverOffset: 4,
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: program.name
                    }
                }
            }
        }
        setTimeout(() => {
            new Chart(document.getElementById(canvasId), config);
        }, 0);
    })


    /*
    *   In case we have more than one Program Submitted,
    *   we will also add a bar chart with all programs included inside!
    * */
    if(programData.length > 1) {
        const canvasId = `canvas-chart-100`;
        reportsContainer.innerHTML += `<canvas id="${canvasId}"></canvas>`;
        const allModulesUnion = getAllUnionModules();
        const config = {
            type: 'bar',
            data: {
                labels: getGroupedBarChartLabels(),
                datasets: getGroupedBarChartDatasets(allModulesUnion),
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        setTimeout(() => {new Chart(document.getElementById(canvasId), config); }, 0)
    }

};

window.addEventListener('DOMContentLoaded', boot);