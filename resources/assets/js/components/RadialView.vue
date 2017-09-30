<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Classes</div>

                    <div class="panel-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            var width = 450,
                height = 450,
                radius = Math.min(width, height) / 2;

            var dataset = [
                {name: 'Block 5', count: 10},
                {label: 'Betelgeuse', count: 20},
                {label: 'Cantaloupe', count: 30},
                {label: 'Dijkstra', count: 40}
            ];
            var color = d3.scaleOrdinal(d3.schemeCategory20b);
            var svg = d3.select('#chart')
                .append('svg')
                .attr('width', width)
                .attr('height', height)
                .attr('viewBox', '0 0 450 450')
                .attr('preserveAspectRatio', 'xMYMin')
                .append('g')
                .attr('transform', 'translate(' + (width / 2) + ',' + (height / 2) + ')');
            var donutWidth = 75
            //calculate arc props
            var arc = d3.arc()
                .innerRadius(radius - donutWidth)
                .outerRadius(radius);
            // create data processing function
            var pie = d3.pie()
                .value(function (d) {
                    return d.count;
                })
                .sort(null);
            // do it
            var path = svg.selectAll('path')
                .data(pie(dataset)) // parse all the data and pass it through
                .enter() //idk
                .append('path') // add a new path
                .attr('d', arc) // assign arc props
                .attr('fill', function (d, i) { // color it
                    return color(d.data.label);
                });

        }
    }
</script>
<style>
    svg {
        height: 100%;
    }
</style>