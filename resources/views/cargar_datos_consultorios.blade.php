<p class="d-flex align-items-center p-3 justify-content-center"><b>Horario de atención del Consultorio de {{ $consultorio->nombre }}</b></p>

<table style="font-size: 12px;" class="table table-striped table-bordered table-hover table-sm">

    <thead class="thead-dark text-center">
        <tr>
            <th width="16%">Hora</th>
            <th width="12%">Lunes</th>
            <th width="12%">Martes</th>
            <th width="12%">Miércoles</th>
            <th width="12%">Jueves</th>
            <th width="12%">Viernes</th>
            <th width="12%">Sábado</th>
            <th width="12%">Domingo</th>
            
        </tr>
    </thead>

    <tbody class="text-center">
        
        @php
            $horas = [ "08:00:00 - 09:00:00", 
                        "09:00:00 - 10:00:00", 
                        "10:00:00 - 11:00:00", 
                        "11:00:00 - 12:00:00", 
                        "12:00:00 - 13:00:00", 
                        "13:00:00 - 14:00:00", 
                        "14:00:00 - 15:00:00", 
                        "15:00:00 - 16:00:00", 
                        "16:00:00 - 17:00:00", 
                        "17:00:00 - 18:00:00", 
                        "18:00:00 - 19:00:00", 
                        "19:00:00 - 20:00:00" ];

            $diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        @endphp

        @foreach ($horas as $hora)

            @php
                list($hora_inicio, $hora_fin) = explode(" - ", $hora);
            @endphp
            
            <tr>
                <td height="50px" style="vertical-align: middle; font-weight: bold;">
                    {{ $hora }}
                </td>

                @foreach ($diasSemana as $dia)
                    @php
                        $nombre_doctor = "";
                        foreach ($horarios as $horario) {

                            if ($horario->dia == $dia && 
                                $hora_inicio >= $horario->hora_inicio && 
                                $hora_fin <= $horario->hora_fin) {

                                $nombre_doctor = $horario->doctor->nombres." ".$horario->doctor->apellidos;
                                break; 
                                    
                            }
            
                        }
                    @endphp
                    <td>{{ $nombre_doctor }}</td>
                @endforeach
            </tr>

        @endforeach
    </tbody>

</table>
