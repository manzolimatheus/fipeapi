<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function get(Request $request, $plate)
    {
        if ($request->query('key') === null) {
            return response()->json(['message' => 'Chave não informada'], 400);
        }

        if (strpos($plate, '-') !== false) {

            $data = [
                'message' => 'Dados inválidos',
                'errors' => [
                    'placa' => [
                        "A Placa tem que ter 7 caracteres",
                        "Formato de placa inválido"
                    ]
                ]
            ];

            return response()->json($data, 400);
        }
        
        $tipos_veiculo = ["Automovel", "Motocicleta"];

        $data = [
            "data" =>[
                "veiculo" => [
                    "uf" => "MS",
                    "ano" => "2013/2013",
                    "cmt" => "335",
                    "cor" => "Prata",
                    "pbt" => "185",
                    "placa" => $plate,
                    "chassi" => "98M50AA08L4A87396",
                    "n_motor" => "MOTOR",
                    "potencia" => "142",
                    "municipio" => "CIDADE",
                    "carroceria" => null,
                    "cilindradas" => "1998",
                    "combustivel" => "Alcool / Gasolina",
                    "procedencia" => "Nacional",
                    "caixa_cambio" => null,
                    "marca_modelo" => "Bmw/x4 Xdrive 28i",
                    "tipo_montagem" => "Completa",
                    "tipo_carroceria" => null,
                    "tipo_de_veiculo" => $tipos_veiculo[array_rand($tipos_veiculo)],
                    "eixo_traseiro_dif" => null,
                    "situacao_do_chassi" => null,
                    "capacidade_de_carga" => "49",
                    "quantidade_de_eixos" => "2",
                    "quantidade_passageiro" => "5"
                ],
                "fipes" => [
                    [
                        "valor" => rand(20000, 200000),
                        "codigo" => "025186-0",
                        "marca_modelo" => "Renault Duster Dynamique 4x4 2.0 Hi-Flex 16v Mec"
                    ],
                    [
                        "valor" => rand(20000, 200000),
                        "codigo" => "025123-0",
                        "marca_modelo" => "Renault Duster Dynamique 4x4 2.0/2.0 Hi-Flex 16v Mec"
                    ]
                ]
            ]
        ];
        
        $empty = ['message' => 'Limite de uso atingido'];

        return response()->json($data);
    }
}
