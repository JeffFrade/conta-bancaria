<?php

require __DIR__ . '/../Tables/Account.php';

class AccountService
{
    private $account;

    /**
     * AccountService constructor.
     */
    public function __construct()
    {
        $this->account = new Account();
    }

    /**
     * @param string $name
     * @param int $accountNumber
     * @param string $type
     * @param float $balance
     *
     * @return string
     */
    public function openAccount(string $name, int $accountNumber, string $type, float $balance)
    {
        $this->account->setName($name);
        $this->account->setAccountNumber($accountNumber);
        $this->account->setType(strtoupper($type));
        $this->account->setBalance($balance);
        $this->account->setStatus(true);

        return sprintf('%s Sua Conta Foi Aberta com o Número: %s do Tipo: %s com Saldo de R$ %s', $this->account->getName(), $this->account->getAccountNumber(), $this->account->getType(), number_format($this->account->getBalance(), 2, ',', '.'));
    }

    /**
     * @return string
     */
    public function closeAccount()
    {
        if ($this->account->getBalance() == 0) {
            $this->account->setStatus(false);
            return 'Conta Fechada com Sucesso!';
        }

        return 'Seu Saldo é Diferente de R$ 0,00, Não Foi Possível Fechar Sua Conta';
    }

    /**
     * @param float $value
     * @return string
     */
    public function deposit(float $value)
    {
        if ($this->account->getStatus()) {
            $this->account->setBalance($this->account->getBalance() + $value);
            return sprintf('Depósito no Valor de R$ %s Efetuado com Sucesso!', number_format($value, 2, ',', '.'));
        }

        return 'Sua Conta Encontra-Se Desativada';
    }

    /**
     * @param float $value
     * @return string
     */
    public function draft(float $value)
    {
        if ($this->account->getStatus()) {
            if ($this->account->getBalance() <= $value) {
                $this->account->setBalance($this->account->getBalance() - $value);

                return sprintf('Saque de R$ %s Efetuado com Sucesso!', number_format($value, 2, ',', '.'));
            }

            return 'Não Autorizado, Saldo Insuficiente';
        }

        return 'Sua Conta Encontra-Se Desativada';
    }

    public function balance()
    {
        return sprintf('Seu Saldo é de R$ %s', number_format($this->account->getBalance(), 2, ',', '.'));
    }
}
