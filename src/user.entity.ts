import {Column, Entity, PrimaryGeneratedColumn} from "typeorm";

@Entity('users')
export class User {
    @PrimaryGeneratedColumn()
    id: number;

    @Column({unique: true})
    email: string;

    @Column({unique:true})
    name: string;

    @Column()
    dob: string;

    @Column()
    telephone: string;

    @Column()
    product: string;

    @Column()
    amountpaid: string;

    @Column()
    dateofpayment: string;

    @Column()
    password: string;
}
