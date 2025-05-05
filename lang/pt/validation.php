<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
'active_url' => 'O :attribute não é uma URL válida.',
'after' => 'O :attribute deve ser uma data posterior a :date.',
'after_or_equal' => 'O :attribute deve ser uma data posterior ou igual a :date.',
'alpha' => 'O :attribute pode conter apenas letras.',
'alpha_dash' => 'O :attribute pode conter apenas letras, números e traços.',
'ascii_only' => 'O :attribute pode conter apenas letras, números e traços.',
'alpha_num' => 'O :attribute pode conter apenas letras e números.',
'array' => 'O :attribute deve ser um array.',
'before' => 'O :attribute deve ser uma data anterior a :date.',
'before_or_equal' => 'O :attribute deve ser uma data anterior ou igual a :date.',
'between' => [
    'numeric' => 'O :attribute deve estar entre :min e :max.',
    'file' => 'O :attribute deve ter entre :min e :max kilobytes.',
    'string' => 'O :attribute deve ter entre :min e :max caracteres.',
    'array' => 'O :attribute deve ter entre :min e :max itens.',
],
'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
'confirmed' => 'A confirmação do :attribute não corresponde.',
'date' => 'O :attribute não é uma data válida.',
'date_format' => 'O :attribute não corresponde ao formato :format.',
'different' => 'O :attribute e :other devem ser diferentes.',
'digits' => 'O :attribute deve ter :digits dígitos.',
'digits_between' => 'O :attribute deve ter entre :min e :max dígitos.',
'dimensions' => 'O :attribute tem dimensões de imagem inválidas (:min_width x :min_height px).',
'distinct' => 'O campo :attribute tem um valor duplicado.',
'email' => 'O :attribute deve ser um endereço de e-mail válido.',
'exists' => 'O :attribute selecionado é inválido.',
'file' => 'O :attribute deve ser um arquivo.',
'filled' => 'O campo :attribute deve ter um valor.',
'gt' => [
    'numeric' => 'O :attribute deve ser maior que :value.',
    'file' => 'O :attribute deve ser maior que :value kilobytes.',
    'string' => 'O :attribute deve ser maior que :value caracteres.',
    'array' => 'O :attribute deve ter mais que :value itens.',
],
'gte' => [
    'numeric' => 'O :attribute deve ser maior ou igual a :value.',
    'file' => 'O :attribute deve ser maior ou igual a :value kilobytes.',
    'string' => 'O :attribute deve ser maior ou igual a :value caracteres.',
    'array' => 'O :attribute deve ter :value itens ou mais.',
],
'image' => 'O :attribute deve ser uma imagem.',
'in' => 'O :attribute selecionado é inválido.',
'in_array' => 'O campo :attribute não existe em :other.',
'integer' => 'O :attribute deve ser um número inteiro.',
'ip' => 'O :attribute deve ser um endereço de IP válido.',
'ipv4' => 'O :attribute deve ser um endereço de IPv4 válido.',
'ipv6' => 'O :attribute deve ser um endereço de IPv6 válido.',
'json' => 'O :attribute deve ser uma string JSON válida.',
'lt' => [
    'numeric' => 'O :attribute deve ser menor que :value.',
    'file' => 'O :attribute deve ser menor que :value kilobytes.',
    'string' => 'O :attribute deve ser menor que :value caracteres.',
    'array' => 'O :attribute deve ter menos que :value itens.',
],
'lte' => [
    'numeric' => 'O :attribute deve ser menor ou igual a :value.',
    'file' => 'O :attribute deve ser menor ou igual a :value kilobytes.',
    'string' => 'O :attribute deve ser menor ou igual a :value caracteres.',
    'array' => 'O :attribute não deve ter mais que :value itens.',
],
'max' => [
    'numeric' => 'O :attribute não deve ser maior que :max.',
    'file' => 'O :attribute não deve ser maior que :max kilobytes.',
    'string' => 'O :attribute não deve ser maior que :max caracteres.',
    'array' => 'O :attribute não deve ter mais que :max itens.',
],
'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
'min' => [
    'numeric' => 'O :attribute deve ser pelo menos :min.',
    'file' => 'O :attribute deve ser pelo menos :min kilobytes.',
    'string' => 'O :attribute deve ter pelo menos :min caracteres.',
    'array' => 'O :attribute deve ter pelo menos :min itens.',
],
'not_in' => 'O :attribute selecionado é inválido.',
'not_regex' => 'O formato :attribute é inválido.',
'numeric' => 'O :attribute deve ser um número.',
'present' => 'O campo :attribute deve estar presente.',
'regex' => 'O formato :attribute é inválido.',
'required' => 'O campo :attribute é obrigatório.',
'required_if' => 'O campo :attribute é obrigatório quando :other é :value.',
'required_unless' => 'O campo :attribute é obrigatório a menos que :other esteja em :values.',
'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
'required_with_all' => 'O campo :attribute é obrigatório quando :values está presente.',
'required_without' => 'O campo :attribute é obrigatório quando :values não está presente.',
'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values está presente.',
'same' => 'O :attribute e :other devem corresponder.',
'size' => [
    'numeric' => 'O :attribute deve ter :size.',
    'file' => 'O :attribute deve ter :size kilobytes.',
    'string' => 'O :attribute deve ter :size caracteres.',
    'array' => 'O :attribute deve conter :size itens.',
],
'string' => 'O :attribute deve ser uma string.',
'timezone' => 'O :attribute deve ser uma zona válida.',
'unique' => 'O :attribute já está sendo utilizado.',
'uploaded' => 'O :attribute falhou ao ser enviado.',
'url' => 'O formato :attribute é inválido.',
'account_not_confirmed' => 'Sua conta não foi confirmada, por favor, verifique seu e-mail.',
'user_suspended' => 'Sua conta foi suspensa, por favor, entre em contato conosco se for um erro.',
'letters' => 'O :attribute deve conter pelo menos uma letra ou número.',
'video_url' => 'URL inválido, suportamos apenas Youtube e Vimeo.',
'update_max_length' => 'A postagem não deve ter mais de :max caracteres.',
'update_min_length' => 'A postagem deve ter pelo menos :min caracteres.',
'video_url_required' => 'O campo URL do vídeo é obrigatório quando o Conteúdo em Destaque é um Vídeo.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
    'agree_gdpr' => 'Caixa Concordo com o processamento de dados pessoais',
    'agree_terms' => 'Caixa Concordo com os Termos e Condições',
    'agree_terms_privacy' => 'Caixa Concordo com os Termos e Condições e Política de Privacidade',
    'full_name' => 'Nome Completo',
    'name' => 'Nome',
    'username' => 'Nome de Usuário',
    'username_email' => 'Nome de Usuário ou Email',
    'email' => 'Email',
    'password' => 'Senha',
    'password_confirmation' => 'Confirmação de Senha',
    'website' => 'Website',
    'location' => 'Localização',
    'countries_id' => 'País',
    'twitter' => 'Twitter',
    'facebook' => 'Facebook',
    'google' => 'Google',
    'instagram' => 'Instagram',
    'comment' => 'Comentário',
    'title' => 'Título',
    'description' => 'Descrição',
    'old_password' => 'Senha Antiga',
    'new_password' => 'Nova Senha',
    'email_paypal' => 'Email PayPal',
    'email_paypal_confirmation' => 'Confirmação de Email PayPal',
    'bank_details' => 'Detalhes Bancários',
    'video_url' => 'URL do Vídeo',
    'categories_id' => 'Categoria',
    'story' => 'História',
    'image' => 'Imagem',
    'avatar' => 'Avatar',
    'message' => 'Mensagem',
    'profession' => 'Profissão',
    'thumbnail' => 'Miniatura',
    'address' => 'Endereço',
    'city' => 'Cidade',
    'zip' => 'Código Postal/ZIP',
    'payment_gateway' => 'Gateway de Pagamento',
    'payment_gateway_tip' => 'Gateway de Pagamento',
    'MAIL_FROM_ADDRESS' => 'Email no-reply',
    'FILESYSTEM_DRIVER' => 'Disco',
    'price' => 'Preço',
    'amount' => 'Quantidade',
    'birthdate' => 'Data de Nascimento',
    'navbar_background_color' => 'Cor de Fundo da Barra de Navegação',
    'navbar_text_color' => 'Cor do Texto da Barra de Navegação',
    'footer_background_color' => 'Cor de Fundo do Rodapé',
    'footer_text_color' => 'Cor do Texto do Rodapé',

    'AWS_ACCESS_KEY_ID' => 'Chave da Amazon', // Não é necessário editar
    'AWS_SECRET_ACCESS_KEY' => 'Chave Secreta da Amazon', // Não é necessário editar
    'AWS_DEFAULT_REGION' => 'Região da Amazon', // Não é necessário editar
    'AWS_BUCKET' => 'Bucket da Amazon', // Não é necessário editar

    'DOS_ACCESS_KEY_ID' => 'Chave da DigitalOcean', // Não é necessário editar
    'DOS_SECRET_ACCESS_KEY' => 'Chave Secreta da DigitalOcean', // Não é necessário editar
    'DOS_DEFAULT_REGION' => 'Região da DigitalOcean', // Não é necessário editar
    'DOS_BUCKET' => 'Bucket da DigitalOcean', // Não é necessário editar

    'WAS_ACCESS_KEY_ID' => 'Chave da Wasabi', // Não é necessário editar
    'WAS_SECRET_ACCESS_KEY' => 'Chave Secreta da Wasabi', // Não é necessário editar
    'WAS_DEFAULT_REGION' => 'Região da Wasabi', // Não é necessário editar
    'WAS_BUCKET' => 'Bucket da Wasabi', // Não é necessário editar

    //===== v2.0
    'BACKBLAZE_ACCOUNT_ID' => 'ID da Conta Backblaze', // Não é necessário editar
    'BACKBLAZE_APP_KEY' => 'Chave Mestra da Aplicação Backblaze', // Não é necessário editar
    'BACKBLAZE_BUCKET' => 'Nome do Bucket Backblaze', // Não é necessário editar
    'BACKBLAZE_BUCKET_REGION' => 'Região do Bucket Backblaze', // Não é necessário editar
    'BACKBLAZE_BUCKET_ID' => 'Endpoint do Bucket Backblaze', // Não é necessário editar

    'VULTR_ACCESS_KEY' => 'Chave da Vultr', // Não é necessário editar
    'VULTR_SECRET_KEY' => 'Chave Secreta da Vultr', // Não é necessário editar
    'VULTR_REGION' => 'Região da Vultr', // Não é necessário editar
    'VULTR_BUCKET' => 'Bucket da Vultr', // Não é necessário editar
],

];
